<?php
return [
    "header" => [
        "message" => [
            "head" => "Messages",
            "empty" => "There seems to be none of the feedback was found this 3 days...",
            "footer" => "All Messages",
        ],
    ],
    "sidebar" => [
        "head" => env('APP_NAME')." Admins",
        "inbox" => "Inbox",
        "blog-category" => "Categories",
        "blog-post" => "Posts",
        "blog-gallery" => "Galleries",
        "footer" => "MAIN SITE",
    ],
    "dashboard" => [
        "card-stats" => [
            "customer" => "Customers",
            "admin" => "Admins",
            "order" => "Orders",
        ],
        "card-traffic" => [
            "head" => "Visitor Traffic",
            "period" => "Period filter",
        ],
        "card-blog" => [
            "head" => "Edit Post",
            "title" => "Title",
            "title-capt" => "Write its title here...",
            "action" => "Action",
            "category" => "Kategori",
            "content" => "Content",
            "content-capt" => "Please, write something about this post!",
        ],
        "card-contact" => [
            "head" => "Customers need help"
        ],
    ],
    "tables" => [
        "blog-category" => "Blog Categories Table",
        "blog-post" => "Blog Posts Table",
        "blog-gallery" => "Blog [:param] Galleries Table",
    ],
    "months" => [
        "jan" => "January",
        "feb" => "February",
        "mar" => "March",
        "apr" => "April",
        "mei" => "May",
        "jun" => "June",
        "jul" => "July",
        "aug" => "August",
        "sep" => "September",
        "oct" => "October",
        "nov" => "November",
        "dec" => "December",
    ],
    "alert" => [
        "feature-fail" => "This feature only works when you`re signed in as a :param.",
        "mass-delete" => ":param successfully deleted!",
        "blog-category" => [
            "create" => "Blog category [:param] is successfully created!",
            "update" => "Blog category [:param] is successfully updated!",
            "delete" => "Blog category [:param] is successfully deleted!",
        ],
        "blog" => [
            "create" => "Blog [:param] is successfully created!",
            "update" => "Blog [:param] is successfully updated!",
            "delete" => "Blog [:param] is successfully deleted!",
        ],
        "blog-gallery" => [
            "update" => ":param successfully added to blog [:param2] gallery!",
            "delete" => "File [:param] is successfully deleted from blog [:param2] gallery!",
            "mass-delete" => ":param successfully deleted from blog [:param2] gallery!",
        ]
    ]
];
