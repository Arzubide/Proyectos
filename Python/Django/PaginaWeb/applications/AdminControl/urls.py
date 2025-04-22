from django.urls import path
from . import views

urlpatterns = [

    path('Borrar-Usuario/<pk>/', views.BorrarUsuarios.as_view()),
]
