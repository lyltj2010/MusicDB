import MySQLdb, json, config

def connect_db():
    """Connect database and return db and cursor"""
    db = MySQLdb.connect(host="localhost",user='root',
                     passwd=config.DB_PASSWD,db="MusicDB")
    cursor = db.cursor()
    return db, cursor

def table_exists(table_name):
    """Check table existence base on table name"""
    db, cursor = connect_db()
    cursor.execute("SELECT * FROM information_schema.tables \
                   WHERE table_name = '%s'" % table_name)
    nrows = int(cursor.rowcount); db.close()
    return False if nrows == 0 else True

def create_table_artist():
    db, cursor = connect_db()
    sql = """CREATE TABLE artist(name CHAR(30) NOT NULL,
             mbid_artist CHAR(50),url CHAR(80),
             listeners INT, playcount INT, image TEXT)"""
    if not table_exists('artist'):
        cursor.execute(sql)
    db.close()

def create_table_album():
    db, cursor = connect_db()

    db.close()

def create_table_track():
    db, cursor = connect_db()

    db.close()

def create_table_tag():
    db, cursor = connect_db()

    db.close()

def insert_into_artist():
    with open('data/artists.json','r') as fp:
        artists = json.load(fp)        
    db, cursor = connect_db()
    sql = """INSERT INTO artist(
           name, mbid_artist, url, listeners, playcount, image)
           VALUES ('%s', '%s', '%s', '%d', '%d', '%s')"""
    for artist in artists:
        try:
            tp = (artist['name'], artist['mbid_artist'], artist['url'], int(artist['listeners']),
                  int(artist['playcount']), artist['image'])
            cursor.execute(sql % tp); db.commit()
        except:
            db.rollback()
    db.close()

def insert_into_album():
    db, cursor = connect_db()

    db.commit(); db.close()

def insert_into_track():
    db, cursor = connect_db()
    
    db.commit(); db.close()

def insert_into_tag():
    db, cursor = connect_db()

    db.commit(); db.close()

def drop_table(table_name):
    db, cursor = connect_db()
    sql = """DROP TABLE %s""" % table_name
    cursor.execute(sql); db.close()

if __name__ == '__main__':
    # drop_table('artist')
    # create_table_artist()
    # insert_into_artist()

