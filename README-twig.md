For this website, Twig shall be used.

In the template (html), use this format:
```
{% extends "layout.html" %}

{% block content %}
            <!-- HTML code -->
{% endblock %}
```

The below code shall be used in all the `.php` files. Code may need to be added for connection with database.
```
<?php
    //This brings in a twig instance for use by this script
    require_once __DIR__.'/bootstrap.php';

    
    // adds to the title tag
    $title = "About Us";
    
    // completes the CSS filename
    $filename = "about";
    
    
    // Render view
    echo $twig->render('about.html', ['title' => $title, 'filename' => $filename]);
?>
```

The following is what each variable should include:
| **Variables** | **Data description**                          | **Example** |
|---------------|-----------------------------------------------|-------------|
| title         | Page heading                                  | `"About Us"`    |
| filename      | The filename of `.php` file without extension | `"about"`      |



To import `database.php`, type `require_once __DIR__.'/database.php';` in the PHP code.
