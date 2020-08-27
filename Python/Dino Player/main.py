import pyautogui  # pip install pyautogui
from PIL import Image, ImageGrab  # pip install pillow
from numpy import asarray  # pip install numpy
import time  # default modual in your python


def hit(key):
    '''
    Function That is Handle pyautogui's keyUp Function
    '''
    pyautogui.keyDown(key)
    pyautogui.keyUp(key)
    return True


def isCollide(data):
    '''
    Function That checks That Cactus Or Bird is in the range of dinosour. Parameters: data,
    data is the array of screen pixels
    '''

    for i in range(200, 360):
        for j in range(370, 373):
            if data[i, j] < 100:
                '''
                Check that bird is in the range of dinosour
                '''
                print('Downed On Bird')
                hit("down")
                return True

    for i in range(200, 360):
        for j in range(373, 460):
            if data[i, j] < 100:
                '''
                Check that Cactus is in the range of dinosour
                '''
                print("Jumped On Cactus")
                hit("space")
                return True


if __name__ == "__main__":
    print("Hey.. Dino game about to start in 3 seconds")
    time.sleep(4)
    hit("space")
    print("Started")
    while True:
        '''
        Taking Screenshots And Convert Into Grayscale Image
        '''
        image = ImageGrab.grab().convert('L')
        data = image.load()
        isCollide(data)
        '''
        # Draw The Ractage in the range of dinosour.
        # Draw the rectangle for cactus
        # print(asarray(image))
        for i in range(170, 360):
            for j in range(383, 460):
                data[i, j] = 0

        #  # Draw the rectangle for birds
        for i in range(170, 360):
            for j in range(320, 373):
                data[i, j] = 100
        image.show()
        break
        '''
