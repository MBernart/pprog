#pragma once

/*! @file Punkt2.h
 *
 * @brief Zawiera deklarację klasy Punkt2
 *
 * Plik zawiera deklarację klasy Punkt2.h.
 * Współrzędne punktu są podawane w układzie kartezjańskim.
 * Klasa zawiera kilka metod skladowych
 *
 * @author Patryk Janiak 3D
 * @date 2021.03.18
 * @version 1.0
 */

#include<ostream>

/** @brief Punkt w przestrzeni R^2 złożony z koordynatów kartezjańskich */
class Punkt2
{
    /** @brief Koordynat kartezjański osi X */
    double x;

    /** @brief Koordynat kartezjański osi Y */
    double y;
    
  public:

    /** @brief Konstruktor domyślny */
    Punkt2();

    /** 
     * @brief Konstruktor główny
     * 
     * @param _x argument typu double przekazujący wartość współrzędnej x
     * @param _y argument typu double przekazujący wartość współrzędnej y
     */
    Punkt2(double _x, double _y);

    /** 
     * @brief Konstruktor kopiujący
     * 
     * @param _p argument typu Punkt2 przekazujący obiekt do skopiowania
     */
    Punkt2(const Punkt2 &);

    /** @brief Destruktor klasy Punkt2 */
    ~Punkt2();

    /** 
     * @brief Setter dla wartości x
     * 
     * @param _x argument typu double przekazujący wartość współrzędnej x
     */
    void setX(double _x);

    /** 
     * @brief Setter dla wartości y
     * 
     * @param _y argument typu double przekazujący wartość współrzędnej y
     */
    void setY(double _y);
    
    /** @brief Getter dla wartości x */
    double getX() const;
    
    /** @brief Getter dla wartości y */
    double getY() const;

    /** @brief Metoda wypisująca położenie punktu (x, y) */
    void print() const;

    /** @brief Metoda obliczająca promień */
    double getRadius() const;

    /** @brief Metoda obliczająca kąt */
    double getAngle() const;

    /** 
     * @brief Metoda obliczająca odległość między dwoma punktami
     * 
     * @param _p argument typu Punkt2 przekazujący drugi punkt
     */
    double getDistance(Punkt2 _p) const;

    /** @brief Metoda obliczająca długość wektora, który tworzy punkt */
    double getLength() const;

    /** 
     * @brief Metoda dodająca ze sobą dwa wektory
     * 
     * @param _p argument typu Punkt2 przekazujący drugi punkt
     * @return Wynik dodawania dwóch wektorów typu Punkt2
     */
    Punkt2 add(Punkt2 _p) const;

    /** 
     * @brief Metoda odejmująca od siebie dwa wektory
     * 
     * @param _p argument typu Punkt2 przekazujący drugi punkt
     * @return Wynik odejmowania dwóch wektorów typu Punkt2
     */
    Punkt2 subtract(Punkt2 _p) const;

    /** 
     * @brief Metoda mnożąca wektor przez skalar
     * 
     * @param skalar argument typu double przekazujący wartość skalara
     * @return Wynik mnożenia wektora przez skalar typu Punkt2
     */
    Punkt2 multiply(double skalar) const;

    /** @brief Metoda obliczająca odwrotność wektora */
    Punkt2 getInverse() const;

    /** 
     * @brief Metoda sprawdzająca czy podany wektor jest odwrotny do pierwszego
     * 
     * @param _p argument typu Punkt2 przekazujący drugi punkt
     * @return Wynik typu bool
     */
    bool isInverse(Punkt2 _p) const;

    /** 
     * @brief Metoda obliczająca iloczyn skaralny dwóch wektorów
     * 
     * @param _p argument typu Punkt2 przekazujący drugi punkt
     */
    double getProduct(Punkt2 _p) const;

    /** 
     * @brief Metoda obliczająca kąt pomiędzy wektorami
     * 
     * @param _p argument typu Punkt2 przekazujący drugi punkt
     */
    double getAngleBetween(Punkt2 _p) const;

    /**
     * @brief Nadpisanie operatora +, wykona metodę add()
     * 
     * @param _p argument typu Punkt2 przekazujący drugi punkt
     * @return Wynik odejmowania dwóch wektorów typu Punkt2
     */
    // Punkt2 operator+(const Punkt2 & _p) const;

    /**
     * @brief Nadpisanie operatora +, wykona metodę add()
     * 
     * @param p1 argument typu Punkt2 przekazujący pierwszy punkt
     * @param p2 argument typu Punkt2 przekazujący drugi punkt
     * @return Wynik odejmowania dwóch wektorów typu Punkt2
     */
    friend Punkt2 operator+(const Punkt2 & p1, const Punkt2 & p2);

    /**
     * @brief Nadpisanie operatora *, wykona metodę multiply()
     * 
     * @param skalar argument typu double przekazujący wartość skalara
     * @return Wynik mnożenia wektora przez skalar typu Punkt2
     */
    Punkt2 operator*(double skalar) const;

    /**
     * @brief Nadpisanie operatora *, wykona metodę getProduct()
     * 
     * @param _p argument typu Punkt2 przekazujący drugi punkt
     */
    double operator*(const Punkt2 & _p) const;

    /** @brief Nadpisanie operatora << */
    friend std::ostream &operator<<(std::ostream &os, const Punkt2 & _p);

    /** @brief Nadpisanie operatora = */
    Punkt2& operator=(const Punkt2& p);

};
