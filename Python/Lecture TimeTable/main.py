from plyer import notification
import time


if __name__ == "__main__":
    # 1 Lec
    notification.notify(
        title="Lecture Notification",
        message="Programm Started",
        timeout=10
    )
    time.sleep(60*30)

    notification.notify(
        title="Lecture Notification",
        message="30 minutes of 1 Lecture.",
        timeout=10
    )
    time.sleep(60*25)

    notification.notify(
        title="Lecture Notification",
        message="2 Lec about to start in 5 Minutes",
        timeout=10
    )
    time.sleep(60*5)

    # 2 Lec
    notification.notify(
        title="Lecture Notification",
        message="2 Lec Started",
        timeout=10
    )
    time.sleep(60*30)

    notification.notify(
        title="Lecture Notification",
        message="30 minutes of 2 Lecture.",
        timeout=10
    )
    time.sleep(60*25)

    notification.notify(
        title="Lecture Notification",
        message="3 Lec about to start in 5 Minutes",
        timeout=10
    )
    time.sleep(60*5)

    # 3 Lec
    notification.notify(
        title="Lecture Notification",
        message="3 Lec Started",
        timeout=10
    )
    time.sleep(60*30)

    notification.notify(
        title="Lecture Notification",
        message="30 minutes of 3 Lecture.",
        timeout=10
    )
    time.sleep(60*25)

    notification.notify(
        title="Lecture Notification",
        message="All Lec about to Complete in 5 Minutes",
        timeout=10
    )
    time.sleep(60*5)

    notification.notify(
        title="Lecture Notification",
        message="All Lec Completed",
        timeout=10
    )


else:
    notification.notify(
        title="Lecture Notification",
        message="Your Lecture Timetable Programme Failed",
        timeout=10
    )

    exit()
