import requests, json, time, os, config

API_KEY = config.API_KEY
headers = {'user-agent': 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5)\
            AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.103 Safari/537.36'}

def get_top_artists():
    url = 'http://ws.audioscrobbler.com/2.0/?method=\
    chart.gettopartists&api_key=%s&format=json' % API_KEY
    response = requests.get(url,headers=headers)
    if response.status_code != 200:
        print("Failed with status_code %s" % response.status_code)
        return
    
    artists = response.json()['artists']['artist']
    singers = []
    for artist in artists:
        singer = {}
        singer['name'] = artist['name']
        singer['listeners'] = artist['listeners']
        singer['playcount'] = artist['playcount']
        singer['mbid_artist'] = artist['mbid']
        singer['url'] = artist['url']
        singer['image'] = artist['image'][2]['#text']
        singers.append(singer)
    
    os.chdir('data')
    with open('top_artists.json','w') as fp:
        json.dump(singers,fp)
    os.chdir('..')





if __name__ == '__main__':
    get_top_artists()