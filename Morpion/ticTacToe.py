#On cree une liste morpionTab avecrien a l'interieur
morpionTab = []
#On cree une liste tab1 avec a l'interieur "-" "-" "-"
tab1 = ["-","-","-"]
#On cree une liste tab2 avec a l'interieur "-" "-" "-"
tab2 = ["-","-","-"]
#On cree une liste tab3 avec a l'interieur "-" "-" "-"
tab3 = ["-","-","-"]
#on rajoute dans la liste morpionTab la tab1
morpionTab.append(tab1)
#on rajoute dans la liste morpionTab la tab2
morpionTab.append(tab2)
#on rajoute dans la liste morpionTab la tab3
morpionTab.append(tab3)
#on cree une variable bot qui est egale a False
bot = False


#on defini une fonction nommer play qui demarre le morpion
def morpion():
    #on cree une variable bot qui est egale a False

    
    #On cree une variable turn qui est agle a 0
    turn = 0
    #on cree une variable X qui est egale a True
    X = True
    #on cree une boucle qui continue tant que turn n'est pas égale a 9
    while turn != 9:
        #On fait un input ou on demandera quel ligne le joeur veux choisir
        choiceX = int(input("choisissez la ligne ou vous voulez jouer : "))
        #On fait un input ou on demandera quel colonne le joeur veux choisir
        choiceY = int(input("Choisissez la colonne que vous voulez jouer : "))
        #Si X est egale a True
        if X:
            #Alors si l'input ligne et l'input colonne est egale ou inferieur a la taille de la liste morpionTab
            if choiceX - 1 <= len(morpionTab) and choiceY - 1 <= len(morpionTab[0]) :
                #Alors si la ligne et la colonne choisi est egale a "-"
                if morpionTab[choiceX - 1][choiceY - 1] == "-":
                    #alors la ligne et la colonne est egale a "x"
                    morpionTab[choiceX - 1][choiceY - 1] = 'x'
                    #pour i dans une distance de 3
                    for i in range(3):
                        #On print morpionTab de i
                        print(morpionTab[i])
                        #Changer X en False
                        X = False
                    #ajouter 1 a turn
                    turn = turn + 1
                #Alors print "cette case a deja ete selectionner"
                else:
                    print("cette case a déja été selectionner ")

        #Sinon
        else:
            #Si  l'input ligne et l'input colonne est egale ou inferieur a la taille de la liste morpionTab
            if choiceX - 1 <= len(morpionTab) and choiceY - 1 <= len(morpionTab[0]) :
                #Alors si la ligne et la colonne choisi est egale a "-"
                if morpionTab[choiceX - 1][choiceY - 1] == "-":
                    #alors la ligne et la colonne est egale a "o"
                    morpionTab[choiceX - 1][choiceY - 1] = 'o'
                    #pour i dans une distance de 3
                    for i in range(3):
                        #On print morpionTab de i
                        print(morpionTab[i])
                        #Changer X en True
                        X = True
                    #ajouter 1 a turn
                    turn = turn + 1
                #Sinon print "cette case a déja été sélèctionner"
                else:
                    print("cette case a déja été selectionner ")

        #Si la ligne 2 et la colonne 2 de morpionTab est egale a "x"
        if morpionTab[1][1] == "x":
            #Alors Si la ligne 1 et la colonne 1 de morpionTab est égale a "x" et la ligne 3 et la colonne 3 de morpionTab est egale a "x"
            if morpionTab[0][0] == "x" and morpionTab[2][2] =="x":
                #Alors print "Player X a gagné"
                print("Player X a gagné")
                turn = turn -1
                #break la boucle
                break
                    
            #Sinon Si la ligne 1 et la colonne 3 de morpionTab est égale a "x" et la ligne 3 et la colonne 1 de morpionTab est egale a "x"
            elif morpionTab[0][2] == "x" and morpionTab[2][0] == "x":
                #Alors print "Player X a gagné"
                print("Player X a gagné")
                turn = turn -1
                #break la boucle
                break
            
            #Sinon Si la ligne 2 et la colonne 1 de morpionTab est égale a "x" et la ligne 2 et la colonne 3 de morpionTab est egale a "x"
            elif morpionTab[1][0] == "x" and morpionTab[1][2] == "x":
                #Alors print "Player X a gagné"
                print("Player X a gagné")
                turn = turn -1
                #break la boucle
                break
                    
            #Sinon Si la ligne 1 et la colonne 2 de morpionTab est égale a "x" et la ligne 3 et la colonne 2 de morpionTab est egale a "x"
            elif morpionTab[0][1] == "x" and morpionTab[2][1] == "x":
                #Alors print "Player X a gagné"
                print("Player X a gagné")
                turn = turn -1
                #break la boucle
                break
        
        #Sinon Si la ligne 2 et la colonne 1 de morpionTab est egale a "x"
        elif morpionTab[1][0] == "x":
            #Sinon Si la ligne 1 et la colonne 1 de morpionTab est égale a "x" et la ligne 3 et la colonne 1 de morpionTab est egale a "x"
            if morpionTab[0][0] == "x" and morpionTab[2][0] =="x":
                #Alors print "Player X a gagné"
                print("Playeur X a gagné")
                turn = turn -1
                #break la boucle
                break
                    
        #Sinon Si la ligne 2 et la colonne 3 de morpionTab est egale a "x"
        elif morpionTab[1][2] == "x":
            #Sinon Si la ligne 1 et la colonne 3 de morpionTab est égale a "x" et la ligne 3 et la colonne 3 de morpionTab est egale a "x"
            if morpionTab[0][2] == "x" and morpionTab[2][2] =="x":
                #Alors print "Player X a gagné"
                print("Playeur X a gagné")
                turn = turn -1
                #break la boucle
                break
                        
        #Sinon Si la ligne 3 et la colonne 2 de morpionTab est egale a "x"
        elif morpionTab[2][1] == "x":
            #Sinon Si la ligne 3 et la colonne 2 de morpionTab est égale a "x" et la ligne 3 et la colonne 3 de morpionTab est egale a "x"
            if morpionTab [2][1] =="x" and morpionTab [2][2] == "x":
                #Alors print "Player X a gagné"
                print("Playeur X a gagné")
                turn = turn -1
                #break la boucle
                break
                    
        #Sinon Si la ligne 1 et la colonne 2 de morpionTab est egale a "x"
        elif morpionTab[0][1] == "x" :
            #Sinon Si la ligne 1 et la colonne 1 de morpionTab est égale a "x" et la ligne 1 et la colonne 3 de morpionTab est egale a "x"
            if morpionTab [0][0] == "x" and morpionTab [0][2] =="x":
                #Alors print "Player X a gagné"
                print("Playeur X a gagné")
                turn = turn -1
                #break la boucle
                break

        #Si la ligne 2 et la colonne 2 de morpionTab est egale a "o"
        if morpionTab[1][1] == "o":
            #Alors Si la ligne 1 et la colonne 1 de morpionTab est égale a "o" et la ligne 3 et la colonne 3 de morpionTab est egale a "o"
            if morpionTab[0][0] == "o" and morpionTab[2][2] =="o":
                #Alors print "Player o a gagné"
                print("Playeur O a gagné")
                turn = turn -1
                #break la boucle
                break
                        
            #Sinon Si la ligne 1 et la colonne 3 de morpionTab est égale a "o" et la ligne 3 et la colonne 1 de morpionTab est egale a "o"
            elif morpionTab[0][2] == "o" and morpionTab[2][0] == "o":
                #Alors print "Player o a gagné"
                print("Player O a gagné")
                turn = turn -1
                #break la boucle
                break
                    
            #Sinon Si la ligne 2 et la colonne 1 de morpionTab est égale a "o" et la ligne 2 et la colonne 3 de morpionTab est egale a "o"
            elif morpionTab[1][0] == "o" and morpionTab[1][2] == "o":
                #Alors print "Player o a gagné"
                print("Player O a gagné")
                turn = turn -1
                #break la boucle
                break
                    
            #Sinon Si la ligne 1 et la colonne 2 de morpionTab est égale a "o" et la ligne 3 et la colonne 2 de morpionTab est egale a "o"
            elif morpionTab[0][1] == "o" and morpionTab[2][1] == "o":
                #Alors print "Player o a gagné"
                print("Player O a gagné")
                turn = turn -1
                #break la boucle
                break
                        
        #Sinon Si la ligne 2 et la colonne 1 de morpionTab est egale a "o"
        elif morpionTab[1][0] == "o":
            #Sinon Si la ligne 1 et la colonne 1 de morpionTab est égale a "o" et la ligne 3 et la colonne 1 de morpionTab est egale a "o"
            if morpionTab[0][0] == "o" and morpionTab[2][0] =="o":
                #Alors print "Player o a gagné"
                print("Playeur O a gagné")
                turn = turn -1
                #break la boucle
                break

        #Sinon Si la ligne 2 et la colonne 3 de morpionTab est egale a "o"
        elif morpionTab[1][2] == "o":
            #Sinon Si la ligne 1 et la colonne 3 de morpionTab est égale a "o" et la ligne 3 et la colonne 3 de morpionTab est egale a "o"
            if morpionTab[0][2] == "o" and morpionTab[2][2] =="o":
                #Alors print "Player o a gagné"
                print("Playeur O a gagné")
                turn = turn -1
                #break la boucle
                break

        #Sinon Si la ligne 3 et la colonne 2 de morpionTab est egale a "o"
        elif morpionTab[2][1] == "o":
            #Sinon Si la ligne 3 et la colonne 2 de morpionTab est égale a "o" et la ligne 3 et la colonne 3 de morpionTab est egale a "o"
            if morpionTab [2][1] =="o" and morpionTab [2][2] == "o":
                #Alors print "Player o a gagné"
                print("Playeur O a gagné")
                turn = turn -1
                #break la boucle
                break
                    
        #Sinon Si la ligne 1 et la colonne 2 de morpionTab est egale a "o"
        elif morpionTab[0][1] == "o" :
            #Sinon Si la ligne 1 et la colonne 1 de morpionTab est égale a "o" et la ligne 1 et la colonne 3 de morpionTab est egale a "o"
            if morpionTab [0][0] == "o" and morpionTab [0][2] =="o":
                #Alors print "Player o a gagné"
                print("Playeur O a gagné")
                turn = turn -1
                #break la boucle
                break


    #Si turn est egale a 9
    if turn == 9 :
        #Alors print une égalité
        print("C'est une égalité")


#executer morpion
morpion()
