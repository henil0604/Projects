from PIL import Image, ImageGrab  # pip install pillow
from numpy import asarray  # pip install numpy
import time
import pydirectinput
import win32api as api
import win32gui as gui
import math
import random
import plyer

def walk (key, hold_time):
    pydirectinput.keyDown(key)
    time.sleep(hold_time)
    pydirectinput.keyUp(key)

def run (key, hold_time):
    pydirectinput.keyDown('ctrl')
    pydirectinput.keyDown(key)
    time.sleep(hold_time)
    pydirectinput.keyUp(key)    
    pydirectinput.keyUp('ctrl')

def jump(n):
    for i in range(n):
        pydirectinput.press('space')
        time.sleep(1)


def jump_with_key(key, hold_time):
    pydirectinput.keyDown('space')
    pydirectinput.keyDown(key)
    pydirectinput.keyUp('space')
    pydirectinput.keyUp(key)        

def left_click():
    pydirectinput.click()

def hold_left_click(hold_time):
    pydirectinput.mouseDown()
    time.sleep(hold_time)
    pydirectinput.mouseUp()

def hold_right_click(hold_time):
    pydirectinput.mouseDown(button='right')
    time.sleep(hold_time)
    pydirectinput.mouseUp(button='right')

def get_mouse_postion_for_infinity_time():
    while True:
        print(pydirectinput.position())

def get_mouse_postion():
    return pydirectinput.position()

def move_mouse(x,y):
    pydirectinput.moveTo(x, y)

def notify(msg, time):
    plyer.notification.notify(
        title="Count",
        message=str(msg),
        timeout=time
    )

time.sleep(5)
print("Started")

if __name__ == "__main__":
    n = input("enter the n: ")
    def check_last_key(key, last_key):
        if key == last_key:
            return True
        else:
            return False

    time.sleep(3)
    jump(2)
    keys = ['w', 's', 'a', 'd']
    last_key = ""
    for i in range(n):
        print(i)
        random_key = keys[random.randrange(0, len(keys))]
        check_key = check_last_key(random_key, last_key)
        if (check_key):
            random_key = keys[random.randrange(0, len(keys))]
        else:
            if random_key == 'a' or random_key == "d":
                random_time = random.randrange(3, 5)
            else:
                random_time = random.randrange(3, 15)

            print("{} For {} Seconds".format(random_key, random_time))
            run(random_key, random_time)
            last_key = random_key
        
        if i == n / 2:
            notify("Half Completed", 5)
        elif i == n - 5:
            notify("About To Complete", 5)        
    
    notify("Count Completed", 10)

    # for i in range(8):
    #     walk('a', 4)
    #     walk('w', 0.4)
    #     walk('d', 4)
    #     walk('w', 0.4)
    #     print(i)

    # for i in range(8):
    #     walk('a', 4)
    #     walk('s', 0.4)
    #     walk('d', 4)
    #     walk('s', 0.4)
    #     print(i)

