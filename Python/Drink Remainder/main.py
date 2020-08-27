from plyer import notification
import time

if __name__ == "__main__":
    while True:
        for i in range(4):
            notification.notify(
                title="Please Drink Water Now",
                message="It's time to Drink Water. You should Drink 300mL Water every Time. will notify You Every 20 Minutes",
                timeout=25
            )
            time.sleep(60*20)

        notification.notify(
            title="Please Go For Toilat",
            message="Now You should Go for Toilat Because You have already drank 1200mL Water.",
            timeout=25
        )
        time.sleep(60*20)


else:
    notification.notify(
        title="Drink Remainder",
        message="Your Drink Remainder Programme Failed",
        timeout=25
    )
    exit()
