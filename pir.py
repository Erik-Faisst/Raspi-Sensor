import RPi.GPIO as GPIO
import MySQLdb as mdb
import time

db = mdb.connect(host="localhost", user="admin", passwd="admin123", db="raspisensor")
cur = db.cursor()

SENSOR_PIN = 23

GPIO.setmode(GPIO.BCM)
GPIO.setup(SENSOR_PIN, GPIO.IN)

stamps = []

def callback(channel):
        stampNo = 0
                
        tstamp = (time.strftime("%Y.%m.%d %H.%M.%S"))
        door = 1
        data = (door, tstamp)
        insert = ("INSERT INTO wp_diagramm (sensorFk, datum) VALUES (%s, %s)")
        
        stamps.append(tstamp)
        stampLength = len(stamps)
        
        if(stampLength != 1):
                stampNo = stampLength - 1
                if(stamps[stampNo] != stamps[stampNo - 1]):
                        cur.execute(insert, data)
                        db.commit()
                        print "Erkannt..."
                
                if(stampLength >= 2):
                        stamps.pop(0)
        elif(stampLength == 1):
                cur.execute(insert, data)
                db.commit()
                print "Erkannt..."
        
try:
        GPIO.add_event_detect(SENSOR_PIN, GPIO.RISING, callback=callback)
        while True:
                time.sleep(5)
except KeyboardInterrupt:
        print('Beende...')
        
db.close()
GPIO.cleanup()

