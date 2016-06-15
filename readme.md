# PHP - TDD - Ćwiczenia 

### Ćwiczenie - Kręgle
Zadaniem jest napisanie klasy o nazwie ```BowlingGame``` która ma służyć do podliczania wyników w grze w kręgle. Klasa ma mieć co najmniej dwie funkcjie:
  1. ```roll(pins)``` - funkcja która jest używana za każdym razem kiedy gracz rzuca,
  2. ```score()``` - funkcja która zwraca ilość punktów uzyskanych do tej pory.
  
Przed napisaniem klasy najpierw stwórz następujące test-casy:
  1. Wszystkie rzuty zbiły 0 kręgli - suma punktów powinna być 0,
  2. Wszystkie rzuty zbijają po jednym kręglu - suma punktów powinna być 10,
  3. Strike w pierwszym rzucie, nastepnie 3 zbite a potem wszystkie pudła - suma punktów powinna być 16,
  4. Strike w pierwszym rzucie, nastepnie 3 zbite kręgle, następnie 4 zbite kręgle a potem wszystkie pudła - suma punktów powinna być 24,
  5. Spare w pierwszej ramce (obojętkie jak zdobyty), potem w nastepnym rzucie 4, następnie 3 i reszta same pudła. Suma punktów powinna wynosić 21.
  6. Gra perfekcyjna (10 x strike).

Zadady jakie muszą być spełnione:
  1. Gra w kręgle składa się z 10 ramek. Każda ramka składa się z dwóch rzutów w których można uzyskać maksymalnie 10 punktów (tyle ile jest kręgli na torze). Ilość punktów z ramki to ilośc zbitych kręgli + bonusy za strike i spare,
  2. Spare - jest to przypadek w którym gracz zbija wszystkie 10 kręgli w dwóch rzutach nalerzących do jednej ramki. Wtedy do punktów z tej ramki są doliczne punkty z następnego rzutu (pierwszego rzutu następnej ramki). Np: W pierwszej ramce gracz rzucił 6 i 4. W kolejnej ramce rzucił 3 i 5. Punktacja za pierwszą ramkę to 13 (6 + 4 + 3), punktacja za drugą ramkę to 8.
  3. Strike - jest to przypadek w którym gracz zbija wszystkie kręgle za pierwszym rzutem nalerzącym do ramki (nie ma drugiego rzutu w tej ramce). W takim przypadku to wyniku z tej ramki dodawane są punkty z kolejnych dwóch rzutów. Np: W pierwszej ramce gracz rzucił 10. W kolejnej ramce rzucił 3 i 5. Punktacja za pierwszą ramkę to 17 (10 + 3 + 5), punktacja za drugą ramkę to 8.
  4. Jeżeli w ostatniej ramce gracz wyrzucił strike albo spare to przysługują mu dodatkowe rzuty (ale nie więcej niż 3).


