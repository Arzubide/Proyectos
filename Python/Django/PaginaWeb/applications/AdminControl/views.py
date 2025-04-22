from django.shortcuts import render
from django.views.generic import DeleteView
from applications.ResgistroSesion.models import RegistroBD

# Create your views here.

class BorrarUsuarios(DeleteView):
    model = RegistroBD
    template_name = 'AdminControl/BorrarUsuario.html'
    success_url = '/'