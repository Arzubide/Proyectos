import re
from django import forms
from .models import RegistroBD


class modeladoRegistroBD(forms.ModelForm):
    class Meta:
        model = RegistroBD #Se trabaja con esa tabla
        fields = (
            'first_name',
            'last_name',
            'email',
            'password',
            'confirmPaswword',
        )
    
        widgets = {
            'password' : forms.PasswordInput( #Definimos que es de tipo password (contraseña)
                attrs = { #Definimos que atributos tendra
                    'plasholder' : 'Ingresa tu contraña'
                } 
            ),
            'confirmPaswword' : forms.PasswordInput(
                attrs = {
                    'plasholder' : 'Confirme su contraseña'
                }
            )
        }

    #Creamos validacion para la confirmacion de la contraseña
    def clean(self): #Utilizamos clean para trabajar con mas de un solo campo
        cleaned_data = super().clean()

        contraseña = cleaned_data.get('password')
        confimarcion = cleaned_data.get('confirmPaswword')

        if contraseña != confimarcion:
            raise forms.ValidationError('Las contraseñas no coinciden') #retorna error
        else:
            return cleaned_data
    
    #Validacion para un correo valido
    def clean_email(self):
        expresionregularCorreo = r'^[\w\.-]+@[\w\.-]+\.\w+$'
        email = self.cleaned_data['email']

        if not re.match(expresionregularCorreo, email):
            raise forms.ValidationError('Ingresa un correo valido') #Retorna el error
        else:
            return email
        
    #Validacion para correos ya existentes
    def clean_email(self):
        email = self.cleaned_data['email']

        if RegistroBD.objects.filter(email = email).exists():
            raise forms.ValidationError('El correo ingresado ya existe') #Retorna el error

        pass