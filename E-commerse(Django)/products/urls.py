from django.urls import path
from . import views

urlpatterns = [
    path('', views.index, name='home'),
    path('product_list/<int:feature_id>', views.product_list, name='product_list'),
    path('type_wise_product/<int:type_id>', views.type_wise_product, name='type_wise_product'),
    path('product_detail/<int:id>', views.product_detail, name='product_detail'),
    path('add_to_cart', views.add_to_cart, name='add_to_cart'),
    path('cart', views.cart, name='cart'),
    path('delete_from_cart', views.delete_from_cart, name='delete_from_cart'),
    path('update_from_cart', views.update_from_cart, name='update_from_cart'),
    path('add_delivery_cost', views.add_delivery_cost, name='add_delivery_cost'),
    path('authlogin', views.authlogin, name='authlogin'),
    path('authlogout', views.authlogout, name='authlogout'),
    path('thanksmessage', views.thanksmessage, name='thanksmessage'),
    path('dashboard', views.dashboard, name='dashboard'),
    #path('Dashboardeditproduct/<str:pk>', views.Dashboardeditproduct, name='Dashboardeditproduct'),

]