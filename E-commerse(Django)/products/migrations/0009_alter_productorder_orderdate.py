# Generated by Django 3.2.4 on 2021-07-01 08:48

import datetime
from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('products', '0008_alter_productorder_orderdate'),
    ]

    operations = [
        migrations.AlterField(
            model_name='productorder',
            name='OrderDate',
            field=models.DateField(default=datetime.date.today, verbose_name='Date'),
        ),
    ]
