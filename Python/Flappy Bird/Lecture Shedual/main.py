import xlrd
import pandas as pd
import datetime
from plyer import notification
import time

if __name__ == "__main__":
    while True:
        df = pd.read_excel('data.xlsx')
        now = str(datetime.datetime.now().strftime("%H:%M"))
        print(now)
        # print(now)

        for index, item in df.iterrows():
            lec = item['Lec']
            startTime = item['Start Time']
            print(startTime)
            endTime = item['End Time']

            if (now == startTime):
                print("Time Matched For {}'s Lecture".format(lec))
                notification.notify(
                    title="Lectur Notification",
                    message="Your Lecture of {} Is going to Start in Ten Minutes".format(
                        lec),
                    timeout=10
                )
    time.sleep(60)

else:
    notification.notify(
        title="Lectur Notification",
        message="Your Lecture Shedual Programme Failed",
        timeout=10
    )
    exit()
