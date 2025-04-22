from django.db import models

# Create your models here.
class RegistroBD(models.Model):
    first_name = models.CharField('Nombre', max_length=40)
    last_name = models.CharField('Apellidos', max_length=40)
    email = models.CharField('Correo', max_length=20)
    password = models.CharField('Contrsenia', max_length=16)
    confirmPaswword = models.CharField('ConfimarcionContraña', max_length=16) #Tengo duda de agregarlo a la B
    
    #Birth = models.DateField()

    def __str__(self):
        return (f'ID: {self.id} - {self.first_name} - {self.last_name}')
