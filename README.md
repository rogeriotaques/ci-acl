# CI ACL 1.0 beta

Implements an Access Control List for your applications written with Codeigniter.

You should use it in order to help you control which path the user can (or cannot) access.

## Getting Started

Download this project, and copy its content into your Codeigniter app, under ```application``` folder.

For example:


```

   / (project root directory)
   /application
   --/config
   --/libraries
   -- ...

```

After "instal" it on your app, then you'll need to setup all acl definitions.

All those definitions should be placed in ``` ./applicaton/config/acl.php```, i.e:

```

$acl = array(

	/* WELCOME */

	'welcome/index' => array(
		'public'
	),

	'welcome/private_users' => array(
		'user'  => TRUE,
        'admin' => FALSE
	),

	'welcome/private_admins' => array(
		'user'  => FALSE,
        'admin' => TRUE
	)

);

```

Finally, in order to test if given path is valid or not, do as following:

```
    
    $ci =& get_instance();
    $ci->load->library('acl');
    
    // check if given path isn't public
    if (! $ci->acl->is_public('path/to/test'))
    {
    
        if (! $ci->acl->is_allowed('path/to/test', 'role-to-test'))
        {
            // do your stuff here ...
            // i.e: set the error message and redirect to some page.
        }
    
    }

```

That's all.

## Methods

There some methods that can be used on runtime:

### is_public( path : string ) : boolean

Return TRUE when given path is set as 'public', otherwise, return FALSE.

### is_allowed( path: string, role : string ) : boolean

Return TRUE when given role is set as 'true' for given path, otherwise, return FALSE.

### set( path : string, config : array ) : void

This method is used to add new ACL rules that are not present on ```config/acl``` on runtime.

It's very useful when you're storing your ACL rules on database. 

I.e:

```

   $ci->acl->set( 'a/new/path/to/check', array( 'user' => FALSE, 'admin' => TRUE ) ); // or
   $ci->acl->set( 'a/new/path/to/check', array( 'public' ) );

```


## Get involved

Report bugs, make suggestions and get involved on contributions.

Feel free to get in touch. ;)
