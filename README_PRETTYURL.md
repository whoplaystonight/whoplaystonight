Si nos aparece un error 404 al acceder a un módulo con las pretty url podría ser porque
están desactivadas en apache.
Para habilitarlas debemos seguir los siguientes pasos:
    1) a2enmod rewrite
    2) Editar /etc/apache2/apache2.conf
    AllowOverride None -> AllowOverride All
    Require all denied -> Require all granted
    3) service apache2 restart
