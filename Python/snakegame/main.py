import pygame
import random

# pygame.init()
pygame.init()

# colors
white = (255, 255, 255)
red = (255, 0, 0)
green = (0, 255, 0)
blue = (0, 0, 255)
black = (0, 0, 0)

screen_width = 900
screen_height = 600

# Creating Window
gameWindow = pygame.display.set_mode((screen_width, screen_height))

# Game Title
pygame.display.set_caption("Snake Game")
pygame.display.update()

clock = pygame.time.Clock()
font = pygame.font.SysFont(None, 55)


def plot_snake(window, color, snk_list, snake_size):
    for x, y in snk_list:
        pygame.draw.rect(window, color, [x, y, snake_size, snake_size])


def text_screen(text, color, x, y):
    screen_text = font.render(text, True, color)
    gameWindow.blit(screen_text, [x, y])


def gameloop():

    # Game Specific Variable
    exit_game = False
    game_over = False
    fps = 10
    score = 0

    snake_x = 45
    snake_y = 35
    snake_size = 10

    valocity_x = 0
    valocity_y = 0
    init_valocity = 3

    food_x = random.randint(20, screen_width/2)
    food_y = random.randint(20, screen_height/2)
    near_food = 5

    snk_list = []
    snk_length = 1

    while not exit_game:
        if game_over:
            gameWindow.fill(white)
            text_screen("Game Over!",
                        red, 200, 250)
            text_screen("Press Enter To Continue",
                        red, 200, 300)
            text_screen("Press Q to Quit",
                        red, 200, 350)

            for event in pygame.event.get():
                if event.type == pygame.QUIT:
                    exit_game = True

                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_RETURN:
                        gameloop()

                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_q:
                        exit_game = True

        else:
            for event in pygame.event.get():
                if event.type == pygame.QUIT:
                    exit_game = True

                if event.type == pygame.KEYDOWN:
                    if event.key == pygame.K_RIGHT:
                        snake_x = snake_x + init_valocity
                        valocity_x = 5
                        valocity_y = 0

                    if event.key == pygame.K_LEFT:
                        snake_x = snake_x - init_valocity
                        valocity_x = -5
                        valocity_y = 0

                    if event.key == pygame.K_DOWN:
                        snake_y = snake_y + init_valocity
                        valocity_y = 5
                        valocity_x = 0

                    if event.key == pygame.K_UP:
                        snake_y = snake_y - init_valocity
                        valocity_y = -5
                        valocity_x = 0

                    if event.key == pygame.K_q:
                        score += 1
                        snk_length += 1

                    if event.key == pygame.K_a:
                        near_food += 50

            snake_x = snake_x + valocity_x
            snake_y = snake_y + valocity_y

            if abs(snake_x - food_x) < near_food and abs(snake_y - food_y) < near_food:
                score += 1
                text_screen("Score: "+str(score), green, 5, 5)
                food_x = random.randint(20, screen_width/1.2)
                food_y = random.randint(20, screen_height/1.2)
                snk_length += 1

            gameWindow.fill(white)
            text_screen("Score: "+str(score), red, 5, 5)
            pygame.draw.rect(gameWindow, red, [
                food_x, food_y, snake_size, snake_size])


            head = []
            head.append(snake_x)
            head.append(snake_y)
            snk_list.append(head)

            if len(snk_list) > snk_length:
                del snk_list[0]

            if head in snk_list[:-1]:
                game_over = True

            if snake_x < 0 or snake_x > screen_width or snake_y < 0 or snake_y > screen_height:
                game_over = True

            plot_snake(gameWindow, black, snk_list, snake_size)

        pygame.display.update()
        clock.tick(fps)

    pygame.quit()
    quit()


gameloop()
