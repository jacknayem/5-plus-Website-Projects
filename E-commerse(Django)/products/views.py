from django.shortcuts import render, redirect
from django.contrib.auth.decorators import login_required
from django.contrib.auth import authenticate, login, logout

from django.http import JsonResponse
from .models import MainFeature, ProductType,SubMenuBanner, indexbanner, ContactInfo, Productinfo
from .models import Hotproducttype, ProductDiscount, cartOrder, cartOrderItems
from django.template.loader import render_to_string
from datetime import date
from django.contrib import messages


# Create home
def index(request):
    categorylist = MainFeature.objects.all()
    producttypelist = ProductType.objects.all()
    bannerlist = indexbanner.objects.all()
    SubMenuBannerList = SubMenuBanner.objects.all()
    ProductinfoList = Productinfo.objects.filter(Hot = True)
    ContactInfoList = ContactInfo.objects.all()
    HotproducttypeList = Hotproducttype.objects.all()

    contex = {
        'categorylist': categorylist,
        'producttypelist': producttypelist,
        'bannerlist': bannerlist,
        'SubMenuBannerList': SubMenuBannerList,
        'HotproducttypeList': HotproducttypeList,
        'ProductinfoList': ProductinfoList,
        'ContactInfoList': ContactInfoList
    }
    return render(request, 'index.html', contex)


# Create category wise product list
def product_list(request, feature_id):
    categorylist = MainFeature.objects.all()
    producttypelist = ProductType.objects.all()
    ContactInfoList = ContactInfo.objects.all()
    feature = MainFeature.objects.get(id = feature_id)
    productdata = Productinfo.objects.filter(MainFeature=feature)
    ProductDiscountMessage = ProductDiscount.objects.all()
    productcontex = {
        'categorylist': categorylist,
        'producttypelist': producttypelist,
        'productdata' : productdata,
        'ProductDiscountMessage': ProductDiscountMessage,
        'ContactInfoList': ContactInfoList,
    }
    return render(request, 'category_wise_product.html', productcontex)


# Create type wise product list
def type_wise_product(request, type_id):
    categorylist = MainFeature.objects.all()
    producttypelist = ProductType.objects.all()
    ProductDiscountMessage = ProductDiscount.objects.all()
    ContactInfoList = ContactInfo.objects.all()
    type = ProductType.objects.get(id=type_id)
    productdata = Productinfo.objects.filter(ProductType=type)
    productcontex = {
        'categorylist': categorylist,
        'producttypelist': producttypelist,
        'productdata' : productdata,
        'ProductDiscountMessage': ProductDiscountMessage,
        'ContactInfoList': ContactInfoList,
    }
    return render(request, 'type_wise_product.html', productcontex)

# Create per product list
def product_detail(request,id):
    categorylist = MainFeature.objects.all()
    producttypelist = ProductType.objects.all()
    ContactInfoList = ContactInfo.objects.all()
    productitem = Productinfo.objects.get(id=id)
    productdata = Productinfo.objects.filter(ProductType=productitem.ProductType).exclude(id=id)
    productcontex = {
        'categorylist': categorylist,
        'producttypelist': producttypelist,
        'productitem' : productitem,
        'productdata': productdata,
        'ContactInfoList': ContactInfoList,
    }
    return render(request, 'product_detail.html', productcontex)

#Add to cart
def add_to_cart(request):
    #del request.session['cartdata'];
    cart_p = {}
    cart_p[str(request.GET['id'])] = {
        'title': request.GET['title'],
        'image': request.GET['image'],
        'qty': request.GET['qty'],
        'price': request.GET['price'],
    }
    if 'cartdata' in request.session:
        if str(request.GET['id']) in request.session['cartdata']:
            cart_data = request.session['cartdata']
            cart_data[str(request.GET['id'])]['qty'] = int(cart_data[str(request.GET['id'])]['qty'])
            cart_data.update(cart_data)
            request.session['cartdata'] = cart_data
        else:
            cart_data = request.session['cartdata']
            cart_data.update(cart_p)
            request.session['cartdata'] = cart_data
    else:
        request.session['cartdata'] = cart_p
    return JsonResponse({'data': request.session['cartdata'], 'totalitems': len(request.session['cartdata'])})

#Cart List page
def cart(request):
    ContactInfoList = ContactInfo.objects.all()
    subtotal_amt = []
    total_amt = 0
    categorylist = MainFeature.objects.all()
    producttypelist = ProductType.objects.all()
    for p_id, item in request.session['cartdata'].items():
        podt = int(item['qty'])*float(item['price'])
        subtotal_amt.append(podt)
        total_amt += podt
    cartcontex = {
        'categorylist': categorylist,
        'producttypelist': producttypelist,
        'cart_data': request.session['cartdata'],
        'totalitems': len(request.session['cartdata']),
        'subtotal_amt': subtotal_amt,
        'total_amt': total_amt,
        'ContactInfoList': ContactInfoList
    }
    if request.method == 'POST':
        TotalPrice = request.POST.get('totalamount')
        CustomerName = request.POST.get('name')
        CustomerNumber = request.POST.get('phone')
        CustomerArea = request.POST.get('area')
        CustomerAddress = request.POST.get('address')
        Productdate = date.today().strftime("%Y-%m-%d")
        productkey = request.session.get('cartdata').keys()
        order = cartOrder(
            CustomerName=CustomerName,
            CustomerNumber=CustomerNumber,
            CustomerArea=CustomerArea,
            CustomerAddress=CustomerAddress,
            OrderDate=Productdate,
            totalmount=TotalPrice
        )
        order.save()
        for p_id, item in request.session.get('cartdata').items():
            items = cartOrderItems(
                order = order,
                invoice_no = 'INV-'+str(order.id),
                item=item['title'],
                image=item['image'],
                Qty=item['qty'],
                Price=item['price'],
                TotalPrice=float(item['price']) * int(item['qty']),
            )
            items.save()
        if len(request.session['cartdata']) != 0:
            request.session['cartdata'] = {}
            return redirect('thanksmessage')
    return render(request, 'cart.html', cartcontex)

#Delete list from cart
def delete_from_cart(request):
    p_id = str(request.GET['id'])
    if 'cartdata' in request.session:
        if p_id in request.session['cartdata']:
            cart_data = request.session['cartdata']
            del request.session['cartdata'][p_id]
            request.session['cartdata'] = cart_data

    subtotal_amt = []
    total_amt = 0
    for p_id, item in request.session['cartdata'].items():
        podt = int(item['qty']) * float(item['price'])
        #podt = 20
        subtotal_amt.append(podt)
        total_amt += podt
    t = render_to_string('ajax/cart-list.html',
                         {'cart_data': request.session['cartdata'],
                          'totalitems': len(request.session['cartdata']),
                          'subtotal_amt': subtotal_amt,
                          'total_amt': total_amt}
    )
    return JsonResponse({'data': t,'totalitems': len(request.session['cartdata'])})

#Update list to cart
def update_from_cart(request):
    p_id = str(request.GET['id'])
    p_qty = request.GET['qty']
    if 'cartdata' in request.session:
        if p_id in request.session['cartdata']:
            cart_data = request.session['cartdata']
            cart_data[str(request.GET['id'])]['qty'] = p_qty
            request.session['cartdata'] = cart_data

    subtotal_amt = []
    total_amt = 0
    for p_id, item in request.session['cartdata'].items():
        podt = int(item['qty']) * float(item['price'])
        #podt = 20
        subtotal_amt.append(podt)
        total_amt += podt
    t = render_to_string('ajax/cart-list.html',
                         {'cart_data': request.session['cartdata'],
                          'totalitems': len(request.session['cartdata']),
                          'subtotal_amt': subtotal_amt,
                          'total_amt': total_amt}
    )
    return JsonResponse({'data': t,'totalitems': len(request.session['cartdata'])})
def add_delivery_cost(request):
    d_price = {}
    d_price = {
        'selecteCost': request.GET['selecteCost'],
        'totalcost': request.GET['totalcost'],
    }
    return JsonResponse({'data':d_price})
def thanksmessage(request):
    categorylist = MainFeature.objects.all()
    producttypelist = ProductType.objects.all()
    ContactInfoList = ContactInfo.objects.all()
    contex = {
        'categorylist': categorylist,
        'producttypelist': producttypelist,
        'ContactInfoList': ContactInfoList
    }
    return render(request, 'thanksmessage.html',contex)
def authlogin(request):
    ContactInfoList = ContactInfo.objects.all()
    contex = {
        'ContactInfoList': ContactInfoList
    }
    if request.method == 'POST':
        name = request.POST['name']
        password = request.POST['password']
        user = authenticate(request, username=name, password=password)
        if user is not None:
            login(request, user)
            return redirect('dashboard')
        else:
            messages.error(request, 'Enter the valid username or password!', extra_tags='alert')
    return render(request, 'login.html', contex)
def authlogout(request):
    logout(request)
    return redirect('authlogin')

#Dashboard
@login_required(login_url='authlogin')
def dashboard(request):
    categorylist = MainFeature.objects.all()
    producttypelist = ProductType.objects.all()
    ContactInfoList = ContactInfo.objects.all()
    cartOrderList = cartOrder.objects.all()
    cartOrderItemsList = cartOrderItems.objects.all()

    if 'update' in request.POST:
        id = request.POST['id']
        remark = request.POST['remark']
        castomer = cartOrder.objects.get(id=id)
        castomer.Remark = remark
        castomer.save()

    elif 'searchdata' in request.POST:
        srch = request.POST['search']
        if srch == '':
            cartOrderList = cartOrder.objects.all()
        else:
            cartOrderList = cartOrder.objects.filter(CustomerNumber=srch)
    contex = {
        'categorylist': categorylist,
        'producttypelist': producttypelist,
        'ContactInfoList': ContactInfoList,
        'cartOrderList': cartOrderList,
        'cartOrderItemsList': cartOrderItemsList
    }
    return render(request, 'dashboard.html',contex)
