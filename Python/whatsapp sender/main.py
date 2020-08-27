import pyautogui as pg
import time

# while True:
#     print(pg.position())


if __name__ == "__main__":
    time.sleep(3)
    for i in range(100):
        pg.moveTo(1245, 698)        
        pg.click()
        pg.keyDown('a')
        pg.moveTo(1330, 700)
        pg.click()
