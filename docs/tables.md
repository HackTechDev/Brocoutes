Base de donnée : Brocoutes
==========================

BrocoutesBrocanteBundle:Manifestation

Manifestation
-------------

nom : string
date : datetime
departement : string
ville : string
codepostal : string
geoloc : string
type :  smallint (publique, particulier, commerce)
exposant: smallint (Non communiqué, particulier, professionnel, particulier et professionel)
adresse : string
organisateur : string
horaire : string
telephone : string
email : string 
site : string
prix : integer
stand : integer
information : text
autre : text
affiche : string
inscription : string
note : integer

expires_at : datetime
created_at : datetime
update_at : datetime


brocante_commentaire
--------------------
# many_to_one
brocanteId
commentaireId

commentaire
-----------

id
utilisateurId
commentaire
note

expires_at : datetime
created_at : datetime
update_at : datetime


utilisateur
-----------

id
pseudo
email
motpasse
departement
ville
codepostal
geolocalisation
datereceptionbrocante
type : organisateur, exposant particulier, exposant professionel, visiteur
active

expires_at : datetime
created_at : datetime
update_at : datetime

brocante_utilisateur
--------------------
# many_to_one

brocanteId
utilisateurId
