import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

def envoyer_notification_email(destinataire, sujet, contenu):
    # Paramètres du serveur SMTP
    serveur_smtp = "smtp.votreserveur.com"
    port_smtp = 587  # Port SMTP (habituellement 587 pour TLS ou 465 pour SSL)

    # Informations d'identification
    adresse_email = "assya_98@hotmail.fr"
    mot_de_passe = "votre_mot_de_passe"

    # Créer un message MIME
    message = MIMEMultipart()
    message['From'] = adresse_email
    message['To'] = destinataire
    message['Subject'] = sujet

    # Ajouter le contenu du message
    message.attach(MIMEText(contenu, 'plain'))

    # Connexion au serveur SMTP
    server = smtplib.SMTP(serveur_smtp, port_smtp)
    server.starttls()  # Activer le chiffrement TLS
    server.login(adresse_email, mot_de_passe)

    # Envoyer l'e-mail
    text = message.as_string()
    server.sendmail(adresse_email, destinataire, text)

    # Fermer la connexion
    server.quit()

# Exemple d'utilisation
destinataire = "destinataire@email.com"
sujet = "Nouvelle commande passée sur votre site"
contenu = "Une nouvelle commande a été passée sur votre site internet."

envoyer_notification_email(destinataire, sujet, contenu)
