/**
 * @file main.cpp
 * @author Mateusz Bernart (mateuszbernart@gmail.com)
 * @brief Implementacja klasy reprezentującej orkiestrę
 * @version 0.1
 * @date 2021-04-08
 *
 * @copyright Copyright (c) 2021
 *
 */

#include <iostream>

using namespace std;

struct Instrument
{
    string nazwa;
    string wlasciciel;
};

class Orkiestra
{
    string dyrygent; // imie i nazwisko w jednym napisie
    int ile_instrumentow; // ilość instrumentów
    Instrument *instrumenty; // wskaźnik do tablicy instrumentów
    string nazwa; // nazwa orkiestry
public:
    /**
     * Konstruktor główny klasy Orkiestra
     *
     * @param _dyrygent - parametr typu string reprezentujący imię i nazwisko dyrygenta
     * @param _ile_instrumentow - parametr typu int reprezentujący ilość ilustrumentów w orkiestrze
     * @param _instrumenty - parametr typu Instrument* reprezentujący instrumenty, które grają w orkiestrze
     * @param _nazwa - parametr typu string reprezentujący nazwę orkiestry
     */
    Orkiestra(string _dyrygent, int _ile_instrumentow, Instrument *_instrumenty, string _nazwa)
    {
        dyrygent = _dyrygent;
        ile_instrumentow = _ile_instrumentow;
        instrumenty = new Instrument[ile_instrumentow];
        for (int i = 0; i < ile_instrumentow; i++)
            instrumenty[i] = _instrumenty[i];
        nazwa = _nazwa;
        cout << "wywołanie konstruktora głównego\n";
    }

    /**
    * Konstruktor domyślny klasy Orkiestra
    */
    Orkiestra()
    {
        dyrygent = "";
        ile_instrumentow = 0;
        instrumenty = nullptr;
        nazwa = "";
        cout << "konstruktor domyślny - bezparametrowy\n";
    }

    /**
     * Konsstruktor kopiujący klasy Orkiestra
     *
     * @param orkiestra referencja do obiektu Orkiestra
     */
    Orkiestra(const Orkiestra &orkiestra)
    {
        dyrygent = orkiestra.dyrygent;
        ile_instrumentow = orkiestra.ile_instrumentow;
        instrumenty = new Instrument[ile_instrumentow];
        for (int i = 0; i < ile_instrumentow; i++)
            instrumenty[i] = orkiestra.instrumenty[i];
        nazwa = orkiestra.nazwa;
        cout << "wywołanie konstruktora kopiującego\n";
    }

    /**
     * Destruktor klasy Orkiestra
     */
    ~Orkiestra()
    {
        delete[] instrumenty;
        cout << "Wywołanie destruktora \n";
    }

    /**
     * Setter składowej dyrygent dyrygent
     *
     * @param _dyrygent - parametr typu string reprezentujący imię i nazwisko dyrygenta
     */
    void setDyrygent(const string &_dyrygent)
    {
        dyrygent = _dyrygent;
    }

    /**
     * Setter składowej ile_instrumentow
     *
     * @param _ile_instrumentow - parametr typu int reprezentujący ilość ilustrumentów w orkiestrze
     */
    void setIleInstrumentow(const int &_ile_instrumentow)
    {
        ile_instrumentow = _ile_instrumentow;
    }

    /**
     * Setter składowej instrumenty
     *
     * @param _instrumenty - parametr typu Instrument* reprezentujący instrumenty, które grają w orkiestrze
     */
    void setInstrumenty(const Instrument *_instrumenty)
    {
        delete[] instrumenty;
        instrumenty = new Instrument[ile_instrumentow];
        for (int i = 0; i < ile_instrumentow; i++)
            instrumenty[i] = _instrumenty[i];
    }

    /**
     * Setter składowej nazwa
     *
     * @param _nazwa - parametr typu string reprezentujący nazwę orkiestry
     */
    void setNazwa(const string &_nazwa)
    {
        nazwa = _nazwa;
    }

    /**
     * Getter składowej dyrygent
     *
     * @return - wartość typu string reprezentująca imię i nazwisko dyrygenta
     */
    string getDyrygent()
    {
        return dyrygent;
    }

    /**
     * Getter składowej ile_instrumentow
     *
     * @return wartość typu int reprezentujący ilość ilustrumentów w orkiestrze
     */
    int getIleInstrumentow()
    {
        return ile_instrumentow;
    }

    /**
     * Getter składowej instrumenty
     *
     * @return wartość typu Instrument* reprezentująca instrumenty, które grają w orkiestrze
     */
    Instrument *getInstrumenty()
    {
        return instrumenty;
    }

    /**
     * Getter składowej nazwa
     *
     * @return wartość typu string reprezentująca nazwę orkiestry
     */
    string getNazwa()
    {
        return nazwa;
    }

};

int main()
{
    Instrument *inst = new Instrument[2]{Instrument{"skrzypce", "chlebosław"}, Instrument{"viola", "krzesimir"}};

    Orkiestra orkiestra = Orkiestra("paewł dowódca", 2, inst, "kopania wojskowa");
    cout << "dyrygent" << orkiestra.getDyrygent() << '\n';
    for (int i = 0; i < orkiestra.getIleInstrumentow(); i++)
        cout << orkiestra.getInstrumenty()[i].nazwa << " - " << orkiestra.getInstrumenty()[i].wlasciciel << '\n';

    Orkiestra orkiestra1 = orkiestra;
    orkiestra.setDyrygent("elwira");

    inst[1].wlasciciel = "bożenka";
    orkiestra.setInstrumenty(inst);

    for (int i = 0; i < orkiestra.getIleInstrumentow(); i++)
        cout << orkiestra.getInstrumenty()[i].nazwa << " - " << orkiestra.getInstrumenty()[i].wlasciciel << '\n';
    cout << '\n';
    for (int i = 0; i < orkiestra1.getIleInstrumentow(); i++)
        cout << orkiestra1.getInstrumenty()[i].nazwa << " - " << orkiestra1.getInstrumenty()[i].wlasciciel << '\n';
    return 0;
}
