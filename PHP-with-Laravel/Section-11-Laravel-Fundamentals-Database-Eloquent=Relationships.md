# Database - Eloquent Relationships

### One to One Relationship
- In one-to-one relationship, each record in one table is linked to exactly one record in another table. This relationship can be defined by using `hasOne()` method.

### One to One Inverse Relationship
- In one-to-one inverse relationship, a linked record can access where it is linked to. This relationship can be defined by using `belongsTo()` method.

### One to Many Relationship
- In one-to-many relationship, a single model is a parent to one or more child models. This relationship can be defined by using `hasMany()` method.

### Many to Many Relationship
- In many-to-many relationship, a record is linked to multiple records, and vice verse. This relationship can be defined by using `belongsToMany()` method.

### Polymorphic Relationship
- In polymorphic relationship, this allows a child model to belong to more than one type of model using a single association.
