# Generated by Django 3.2.4 on 2021-07-01 08:54

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('products', '0009_alter_productorder_orderdate'),
    ]

    operations = [
        migrations.AlterField(
            model_name='productorder',
            name='OrderDate',
            field=models.DateField(auto_now_add=True, verbose_name='Date'),
        ),
    ]
