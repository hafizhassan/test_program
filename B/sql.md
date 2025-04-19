In my oppinion there are several tweaks can be done to increase the query performance

1. We need to make sure to have indexes for all foreign key.
2. We can avoid using left join instead use inner join for table that we know having null data
3. We also can limit column selection where we can inlude only column that we need since the all the data maybe not be used by the user.
4. Query caching also can reduce the execution time for the query if the identical statement exist, the server retrieves the results from the query cache instead of rerun the query again.
