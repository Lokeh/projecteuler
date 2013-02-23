#! /usr/bin/env python
# Problem 2: Find the sum of all the even fibonacci numbers less than 4,000,000
#
# Each even fibonacci number is at index of multiple 3: e.g. 3,6,9.
# Also, for all n < 34, fib(n) < 4,000,000
#
# Author: Will Acton

# Binet's Formula: this function is precise for all n < 70. After
# wards rounding error takes over.
phi = (1 + 5**0.5) / 2
def fib(n):
    return int(round((phi**n - (1-phi)**n) / 5**0.5))

k = 3
total = 0
while (k < 34):
    total = total + fib(k)
    k += 3

print total
    
