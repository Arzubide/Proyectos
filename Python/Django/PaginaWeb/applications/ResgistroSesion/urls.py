from django.urls import path
from . import views

app_name = 'urls_registro'

urlpatterns = [
    path('Registro/', views.RegsitroSesion.as_view()),
    path(
        'Registro/Exito',
        views.RegistroExito.as_view(),
        name= 'RegistroExito'
    ),
    path('Listado-Empleados/', views.ListadoDeRegistros.as_view()),
    path('ActualizarDatos/<pk>', views.ActualizarDatos.as_view())
]