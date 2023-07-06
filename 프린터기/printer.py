# 프린트기에 사용되는 코드

from typing import Any

default = 0


class Printer:
    def __init__(self, paper=default, ink=default, total=default):
        self.paper = paper
        self.ink = ink
        self.total = total

    def print_paper(self, num: int) -> None:
        if self.paper and self.ink >= num:
            print(f'인쇄물을 {num}장 출력했습니다.')
            self.paper -= num
            self.ink -= num
            self.total += num
            print(f'남은 종이: {self.paper}, 남은 잉크: {self.ink}', '\n')
        else:
            print('인쇄물을 출력할 수 없습니다.')
            print(f'남은 종이: {self.paper}, 남은 잉크: {self.ink}')
            print('종이와 잉크의 보충이 필요합니다.', '\n')

    def p_refill(self, p_num: int) -> None:
        print(f'종이를 {p_num}장 보충했습니다.', '\n')
        self.paper += p_num

    def i_refill(self, i_num: int) -> None:
        print(f'잉크를 {i_num}장 보충했습니다.', '\n')
        self.ink += i_num

    def dump(self) -> None:
        print(f'남은 종이: {self.paper}, 남은 잉크: {self.ink},'
              f' 총 출력한 인쇄물의 수: {self.total}', '\n')
