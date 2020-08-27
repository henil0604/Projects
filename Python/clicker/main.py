import pyautogui as pg
import time

if __name__ == "__main__":
    time.sleep(5)
    while True:
        # pos = pyautogui.position()
        # print(pos)
        pg.moveTo(1000, 643)
        pg.click()
        pg.keyDown('H')
        pg.keyDown('i')
        pg.moveTo(1080, 643)
        pg.click()
        time.sleep(1)
