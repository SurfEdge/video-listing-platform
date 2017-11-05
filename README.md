# YouTube Group Video Listing Platform
List multiple (group) YouTube videos in a page based layout.
Ex: Lecture sessions, Movie Trailers, Favorites..

## Development
This is developed using the PHP CodeIgnitor Framework with Bootstrap for the frontend.

## Platform components
1. Dashboard - Where administrator can publish grouped videos
2. Public View
   * Overview - List of all the grouped videos
   * View of a single group
   
## Data model
```  
o
|-- Video Group
|   |-- Title
|   |-- Description
|   |-- Image
|   |-- Author {}
|   `-- List of Videos []
|-- Author
|   |-- Name
|   `-- Image
`-- Video
    |-- Title
    `-- YouTube ID
```

## Installation guide
Rename the following files as mentioned below
1. application/config/config.sample.php --> config.php
2. application/config/database.sample.php --> database.php

Change the 'base_url' in config.php

## Sample Applications
To be Added
