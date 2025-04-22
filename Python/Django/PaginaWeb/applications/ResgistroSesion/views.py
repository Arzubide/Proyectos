from django.shortcuts import render
from django.views.generic import TemplateView, CreateView, ListView,UpdateView
from .models import RegistroBD
from django.urls import reverse_lazy
from .forms import modeladoRegistroBD

# Create your views here.

class RegistroExito(TemplateView):
    template_name = 'templates/RegistroExitoso.html'


class RegsitroSesion(CreateView):
    template_name = 'templates/Registro.html'
    model = RegistroBD
    form_class = modeladoRegistroBD #Sustituyemos fields
    success_url = reverse_lazy('urls_registro:RegistroExito')


class ListadoDeRegistros(ListView):
    model = RegistroBD
    template_name = 'templates/ListadoRegistros.html'
    context_object_name = 'Lista'
    paginate_by = 5


class ActualizarDatos(UpdateView):
    model = RegistroBD
    template_name = 'templates/ActualizarDatos.html'
    fields = ('__all__')

    
