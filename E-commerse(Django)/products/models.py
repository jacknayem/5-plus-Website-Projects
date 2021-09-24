from django.db import models
import datetime
from django.utils.html import mark_safe


# Create your models here.
class MainFeature(models.Model):
    name = models.CharField(max_length=20, blank=False)

    class Meta:
        verbose_name_plural = '1. Main Features'

    def __str__(self):
        return self.name


class ProductType(models.Model):
    FeatureName = models.ForeignKey(MainFeature, on_delete=models.CASCADE)
    TypesName = models.CharField(max_length=50)

    class Meta:
        verbose_name_plural = '2. Sub Menu'

    def __str__(self):
        return str(self.TypesName)


#Hot Product
class Hotproducttype(models.Model):
    Name = models.ForeignKey(ProductType, on_delete=models.CASCADE)
    image = models.ImageField(upload_to='images/hotproduct', blank=False)

    class Meta:
        verbose_name_plural = '3. Hot product Category'

    def image_tag(self):
        return mark_safe('<img src = "%s" width="50" height="50"/>' % self.image.url)

    def __str__(self):
        return str(self.Name)


# Banner for sub-menu
class SubMenuBanner(models.Model):
    FeatureName = models.ForeignKey(MainFeature, on_delete=models.CASCADE)
    image = models.ImageField(upload_to='images/subbanner', blank=False)

    class Meta:
        verbose_name_plural = '3 Sub-menu Banner'

    def image_tag(self):
        return mark_safe('<img src = "%s" width="50" height="50"/>' % self.image.url)

    def __str__(self):
        return str(self.FeatureName)
# End Banner for sub-menu

class ContactInfo(models.Model):
    CONTACT_WAY_LIST = [
        ('ADDRESS', 'ADDRESS'),
        ('PHONE', 'PHONE'),
        ('EMAIL', 'EMAIL'),
        ('SERVING DAY', 'SERVING DAY'),
    ]
    ContactWay = models.CharField(max_length=50, choices=CONTACT_WAY_LIST)
    details = models.CharField(max_length=100, blank=False)

    class Meta:
        verbose_name_plural = '5 Contact Info'

    def __str__(self):
        return str(self.ContactWay)


#End Banner for sub-menu

class Productinfo(models.Model):
    MainFeature = models.ForeignKey(MainFeature, on_delete=models.CASCADE)
    ProductType = models.ForeignKey(ProductType, on_delete=models.CASCADE)
    Title = models.CharField(max_length=30, blank=False)
    Hot = models.BooleanField(default=True, blank=True)
    Discount = models.CharField(max_length=2, blank=True)
    OldPrice = models.PositiveIntegerField(blank=False)
    Price = models.PositiveIntegerField(blank=False)
    Features = models.TextField(max_length=150, blank=False)
    Description = models.TextField(max_length=1500, blank=False)
    ProductImage = models.ImageField(upload_to='images/products', blank=False)
    ProductImage2 = models.ImageField(upload_to='images/products', blank=True)
    ProductImage3 = models.ImageField(upload_to='images/products', blank=True)
    ProductImage4 = models.ImageField(upload_to='images/products', blank=True)
    status = models.BooleanField(default=True)

    class Meta:
        verbose_name_plural = '6. Product Details'

    def image_tag(self):
        return mark_safe('<img src = "%s" width="50" height="50"/>' % self.ProductImage.url)

    def __str__(self):
        return self.Title

# Product List page Banner
class ProductDiscount(models.Model):
    Trend = models.CharField(max_length=50, blank=False)
    DiscountMessage = models.CharField(max_length=50, blank=False)
    startAmount = models.PositiveIntegerField()
    EndAmount = models.PositiveIntegerField()
    image = models.ImageField(upload_to='images/', blank=False)


    class Meta:
        verbose_name_plural = '7. Product Discount Info'

    def image_tag(self):
        return mark_safe('<img src = "%s" width="100" height="50"/>' % self.image.url)
    def __str__(self):
        return self.Trend
# End Product List Bannar


class indexbanner(models.Model):
    img = models.ImageField(upload_to='banner', blank=False)
    alt_text = models.CharField(max_length=20, blank=False)

    class Meta:
        verbose_name_plural = '8. Home Page Banner'

    def image(self):
        return mark_safe('<img src = "%s" width="100" height="50"/>' % self.img.url)

    def __str__(self):
        return self.alt_text


#Castomer Order
class cartOrder(models.Model):
    CustomerName = models.CharField(max_length=40)
    CustomerNumber = models.CharField(max_length=14)
    CustomerArea = models.CharField(max_length=50)
    CustomerAddress = models.TextField(max_length=150)
    Remark = models.TextField(max_length=150)
    OrderDate = models.DateField(("Date"), default=datetime.date.today)
    PaidStatus = models.BooleanField(default=False)
    totalmount = models.CharField(max_length=6, default=0)
    class Meta:
        verbose_name_plural = '9. Customer Order'


    def __str__(self):
        return self.CustomerName

class cartOrderItems(models.Model):
    order = models.ForeignKey(cartOrder, on_delete=models.CASCADE)
    invoice_no = models.CharField(max_length=150)
    item = models.CharField(max_length=150)
    image = models.TextField(max_length=200)
    Qty = models.IntegerField()
    Price = models.IntegerField()
    TotalPrice = models.IntegerField()
    class Meta:
        verbose_name_plural = '10. Order Items'

    def image_tag(self):
        return mark_safe('<img src = "%s" width="50" height="50"/>' % self.image)

    def __str__(self):
        return self.invoice_no