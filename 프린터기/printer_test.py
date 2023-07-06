# 프린트기 코드로 구현한 프린터 프로그램

from enum import Enum
from printer import Printer

Menu = Enum('Menu', ['인쇄물출력', '재료보충', '스캔', '프린트종료'])


def select_menu() -> Menu:
    s = [f'({m.value}){m.name}' for m in Menu]
    while True:
        print(*s, sep='  ', end='')
        n = int(input(': '))
        if 1 <= n <= len(Menu):
            return Menu(n)


operation = Printer(10, 10)

while True:
    menu = select_menu()

    if menu == Menu.인쇄물출력:
        operation.print_paper(int(input('출력할 인쇄물의 수를 입력하세요.: ')))
    elif menu == Menu.재료보충:
        operation.p_refill(int(input('보충할 종이의 양을 입력하세요.: ')))
        operation.i_refill(int(input('보충할 잉크의 양을 입력하세요.: ')))
    elif menu == Menu.스캔:
        operation.dump()
    else:
        break
