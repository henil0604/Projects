import pyautogui as pag  # pip install pyautogui
from PIL import Image, ImageGrab  # pip install pillow
import time
import random


if __name__ == "__main__":

    time.sleep(3)
    print("STARTING...")
    pag.keyDown('S')
    pag.keyDown('t')
    pag.keyDown('a')
    pag.keyDown('r')
    pag.keyDown('t')
    pag.keyDown('i')
    pag.keyDown('n')
    pag.keyDown('g')
    for i in range(3):
        pag.keyDown('.')
    pag.keyDown(' ')
    pag.keyDown('T')
    pag.keyDown('h')
    pag.keyDown('i')
    pag.keyDown('s')
    pag.keyDown(' ')
    pag.keyDown('P')
    pag.keyDown('y')
    pag.keyDown('t')
    pag.keyDown('h')
    pag.keyDown('o')
    pag.keyDown('n')
    pag.keyDown(' ')
    pag.keyDown('S')
    pag.keyDown('c')
    pag.keyDown('r')
    pag.keyDown('i')
    pag.keyDown('p')
    pag.keyDown('t')
    pag.keyDown(' ')
    pag.keyDown('i')
    pag.keyDown('s')
    pag.keyDown(' ')
    pag.keyDown('M')
    pag.keyDown('a')
    pag.keyDown('d')
    pag.keyDown('e')
    pag.keyDown(' ')
    pag.keyDown('B')
    pag.keyDown('y')
    pag.keyDown(' ')
    pag.keyDown('H')
    pag.keyDown('e')
    pag.keyDown('n')
    pag.keyDown('i')
    pag.keyDown('l')
    pag.keyDown(' ')
    pag.keyDown('M')
    pag.keyDown('a')
    pag.keyDown('l')
    pag.keyDown('a')
    pag.keyDown('v')
    pag.keyDown('i')
    pag.keyDown('y')
    pag.keyDown('a')
    pag.keyDown('enter')

    # time.sleep(2)
    # for i in range(34):
    #     pag.keyDown('backspace')

    time.sleep(5)
    print("Running...")
    pag.keyDown(',')
    pag.keyDown('s')
    pag.keyDown('enter')

    while True:
        for i in range(20):
            time.sleep(10)
            print("Running...")
            pag.keyDown(',')
            pag.keyDown('s')
            pag.keyDown('enter')

        time.sleep(1)
        print("Upgrading Pickaxe...")
        pag.keyDown(',')
        pag.keyDown('u')
        pag.keyDown('p')
        pag.keyDown(' ')
        pag.keyDown('p')
        pag.keyDown('i')
        pag.keyDown('c')
        pag.keyDown('k')
        pag.keyDown(' ')
        pag.keyDown('2')
        pag.keyDown('enter')

        time.sleep(1)
        print("Upgrading Backpack...")
        pag.keyDown(',')
        pag.keyDown('u')
        pag.keyDown('p')
        pag.keyDown(' ')
        pag.keyDown('b')
        pag.keyDown('p')
        pag.keyDown(' ')
        pag.keyDown('2')
        pag.keyDown('enter')

    time.sleep(2)
    ruppes = "6 0 0"
    print("Sloting for " + ruppes)
    pag.keyDown(',')
    pag.keyDown('s')
    pag.keyDown('l')
    pag.keyDown('o')
    pag.keyDown('t')
    pag.keyDown(' ')
    for i in range(3):
        pag.keyDown(ruppes.split(" ")[i])
    pag.keyDown('enter')
