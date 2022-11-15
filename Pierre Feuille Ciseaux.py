from random import *

#on defini une fonction nommer play qui demarre le partie de pierre feuille ciseaux
def play():
    #On assigne une varible turn ou on inscrit 0
    turn = 0
    #On assigne une varible win ou on inscrit 0
    win = 0
    #On assigne une varible lose ou on inscrit 0
    lose = 0
    #On assigne une varible draw ou on inscrit 0
    draw = 0

    #on cree une boucle jusqu'a qu'il y a 3 tour de passer
    while turn != 3:
        #On cree une variable choice on assigne le retour de l'execution de la fonction input ou on demande au joueur d'entrer "pierre", "feuille" ou "ciseaux" 
        choice = input('Veuillez choisir "pierre", "feuille" ou "ciseaux": ')
        #On verifie que choice est bien egale a pierre, feuille ou ciseaux
        while choice not in ["pierre","feuille","ciseaux"]:
           choice = input("Veuillez écrire pierre, feuille ou ciseaux :")
        #On cree une variable resultat ou assigne le retour de l'execution de la fonction random 
        resultat = randint(0,2)
        #Si resultat est egale a 0
        if resultat == 0:
            #Alors on renvoie le message "égalité"
            print("Vous avez fait une égalité")
            #On ajoute 1 a la variable win  
            draw = draw + 1 
        #Sinon si resultat est egale a 1
        elif resultat == 1:
            #Alors on renvoie le message "Vous avez gagner"
            print("Vous avez gagné ^^") 
            #On ajoute 1 a la variable win  
            win = win + 1 
        #Sinon si resultat est egale a 2
        elif resultat == 2:
            #Alors on renvoie le message "Vous avez perdu"
            print("Vous avez perdu ;-;") 
            #On ajoute 1 a la variable win  
            lose = lose + 1 
        #on ajoute 1 a la variable turn
        turn = turn + 1
    #On 
    print("---------------------------------------------------------------")
    print( "Vous avez gagné : " + str(win) + ' fois' )
    print( "Vous avez égalisé : " + str(draw) + ' fois' )
    print( "Vous avez perdu : " + str(lose) + ' fois' )
    

play()