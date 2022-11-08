import math as m

class Movie:
   #The constructor of the class
    def __init__(self,card,ticket,perc):
        self.card = card
        self.ticket = ticket
        self.perc = perc

    def movie(self):
        #we initialize the variables
        card = self.card
        ticket = self.ticket
        perc = self.perc
       
        n = 1
        money_A = n*ticket
        money_B = card + (ticket*(perc**n))

        #A typical while structure
        while ( money_A < m.ceil(money_B) ):
            n += 1
            money_A = n*ticket
            money_B += (ticket*(perc**n))

        return n
#we create an object and we pass the values for the parameters
my_obj = Movie(500,15,0.9)
#we show the result
my_obj.movie()
