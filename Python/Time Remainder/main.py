import datetime
import time
from plyer import notification

if __name__ == "__main__":
    while True:
        dt = datetime.datetime
        now = dt.now()
        hour = now.hour
        if hour > 12:
            hour = hour-12
        minutes = now.minute
        if minutes < 10:
            minutes = "0{}".format(minutes)
        seconds = now.second
        if seconds < 10:
            seconds = "0{}".format(seconds)
        date = now.day
        month = now.month
        year = now.year

        mainTime = "Time: {}:{}:{}".format(hour, minutes, seconds)
        mainDate = "Date: {}-{}-{}".format(date, month, seconds)

        mainNoti = "{}\n{}".format(mainTime, mainDate)
        print("{}\n{}".format(mainTime, mainDate))

        notification.notify(
            title="Time Notification",
            message=mainNoti,
            timeout=10
        )

        time.sleep(60*10)

else:
    notification.notify(
        title="Time Notification",
        message="Your Time Notifiaction Programm Failed",
        timeout=10
    )
    exit()
