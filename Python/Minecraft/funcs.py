from PIL import Image, ImageGrab  # pip install pillow
from numpy import asarray  # pip install numpy
import time
import pydirectinput
import win32api as api
import win32gui as gui
import math


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

def hold_left_click(hold_time):
    pydirectinput.mouseDown()
    time.sleep(hold_time)
    pydirectinput.mouseUp()

def get_mouse_postion_for_infinity_time():
    while True:
        print(pydirectinput.position())

def get_mouse_postion():
    return pydirectinput.position()

def move_mouse(x,y):
    pydirectinput.moveTo(x, y)
