import requests, json, time, os, config

API = 'http://ws.audioscrobbler.com/2.0/'
API_KEY = config.API_KEY
headers = {'user-agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5)\
            AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36'}

def get_top_artists_list():
    """
    Get a list of top artists, represented by mbid
    """
    method = 'chart.gettopartists'
    url = '%s?method=%s&api_key=%s&format=json' % (API, method, API_KEY)
    response = requests.get(url,headers=headers)
    if response.status_code != 200:
        print("Failed with status_code %s" % response.status_code)
        return
    
    artists = response.json()['artists']['artist']
    os.chdir('data')
    with open('top_artists_mbid.txt','w') as fo:
        for artist in artists:
            mbid = artist['mbid']
            fo.write(mbid + '\n')
    os.chdir('..')

def get_artists():
    """
    Use mbid_artist to get artist information
    """
    with open('data/top_artists_mbid.txt') as fo:
        lst = [x.strip() for x in fo.readlines()]

    singers = []
    method = 'artist.getinfo'   
    for mbid in lst:
        url = '%s?method=%s&mbid=%s&api_key=%s&format=json' % (API, method, mbid, API_KEY)
        response = requests.get(url,headers=headers)
        if response.status_code != 200:
            print("Failed with status_code %s" % response.status_code)
            continue
        
        try:
            singer = {} # extract part of artist information
            artist = response.json()['artist']
            singer['name'] = artist['name']
            singer['mbid_artist'] = artist['mbid']
            singer['url'] = artist['url']
            singer['listeners'] = artist['stats']['listeners']
            singer['playcount'] = artist['stats']['playcount']
            singer['image'] = artist['image'][2]['#text']
            singer['summary'] = artist['bio']['summary']
            singers.append(singer)
            print("Processed singer %s" % singer['name'])
            time.sleep(1)
        except ValueError as ex:
            print("Exception: %s" % ex)

    os.chdir('data')
    with open('artists.json','w') as fp:
        json.dump(singers,fp)
    os.chdir('..')

if __name__ == '__main__':
    # get_top_artists_list()
    # get_artists()
