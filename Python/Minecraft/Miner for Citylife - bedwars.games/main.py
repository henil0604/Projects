from PIL import Image, ImageGrab, ImageChops  # pip install pillow
from numpy import asarray  # pip install numpy
import time
import pydirectinput
import os
import pyautogui
import pynput
import keyboard

mouse = pynput.mouse.Controller()

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

def jump():
    pydirectinput.press('space')

def jump_with_key(key, hold_time):
    pydirectinput.keyDown('space')
    pydirectinput.keyDown(key)
    pydirectinput.keyUp('space')
    pydirectinput.keyUp(key)        

def left_click():
    pydirectinput.click()

def hold_left_click(hold_time=10):
    pydirectinput.mouseDown()
    time.sleep(hold_time)
    mouseingUp = pydirectinput.mouseUp()

def get_mouse_postion():
    x, y = pydirectinput.position()
    return x, y

def movemouse_smoothly(xm, ym, t):
    for i in range(t):
        if i < t/2:
            h = i
        else:
            h = t - i
            
        pydirectinput.moveTo(h*xm, h*ym)
        time.sleep(1/60)
    
    return xm, ym, t

def move_plus_to(plus_x, plus_y, t):
    pass    


print("Programme Starting in 5 seconds")
time.sleep(5)
print("Started")

if __name__ == "__main__":
    # walk('w', 0.9)
    # walk('d', 0.8)
    # walk('w', 0.3)
    # walk('w', 2)
    mouseingUp = hold_left_click(hold_time=99999)
