import pyautogui as pg
import time
pg.failSafeCheck = True
# while True:
#     print(pg.position())

if __name__ == "__main__":
    time.sleep(5)
    while True:
        pg.moveTo(1252, 700)
        pg.click()
        pg.keyDown('.')
        pg.moveTo(1333, 696)
        pg.click()
        time.sleep(0.2)
