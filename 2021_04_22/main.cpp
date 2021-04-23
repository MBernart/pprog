/**
 * @file main.cpp
 * @author Mateusz Bernart (mateuszbernart@gmail.com)
 * @brief 
 * @version 0.1
 * @date 2021-04-22
 * 
 * @copyright Copyright (c) 2021
 * 
 */

#include "Punkt2.h"
// #include <iostream>

using namespace std;

int main(void)
{
    cout << "a";
    //↓l-wartość    ↓ r-wartość
    Punkt2 p1 = Punkt2(10, 20); // konstruktor kopiujący
    // Punkt2 p1 = Punkt2(10, 20);
    Punkt2 &p2 = p1;
    cout << p1;
    return 0;
}