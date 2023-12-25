### 01/11/2023 - CJ FELICITAS
- Added the Centenarrian Program in the ProgramsEnum.
- Added a new function from the OverviewController for getting the grand total amount for each quarter.
- Added a new API route.
- Fixed the return logic of the get_program_overview function from the overview controller.
### 28/10/2023 - CJ FELICITAS
- partially fixed the logic of query for 4ps in overview page.
- Added the unseeder file.
- commented out the batchlist and benefeciary seeder (bugfix).
- commented out the outcomeindicator seeder in the DatabaseSeeder class.
- Partially fixed the batchlist and benefeciary models for Object Relational Mapping (ORM).

### 27/10/2023 - CJ Felicitas
- Deleted some few useless controllers.
- Modified the name of the beneficiaries migration from benefeciaries to beneficiaries (table name typo).
- Created a new controller for the OverviewPage.
- Added some new seeders for the batchlist table.
- configured the cors for server test.
### 22/10/2023 - CJ Felicitas
- Added a new function in the SearchFunctionController where it returns the data of a program.
- Added a new route in the API which is for the getProgramData function in the SearchFunctionController.
### 21/10/2023 - CJ Felicitas
- Dropped the physical_count, steering_measures, steering_measures_quarterly, reason_of_variance, reason_of_variance_quarterly tables.
- Replaced the physical_count table with the batch_list table.
- Added a the methods for the search function.

### 20/10/2023 - CJ Felicitas
- Added a new migration files (please refer to the migration_jobs table).
- Added a new seeders [OutcomeIndicatorType, UserTypeSeeder].
- Modified the order of the Database Seeder (fixed the order of seeding).
- Modified the User Seeder.
- Added a new Enums [OutcomeIndicatorTypeEnum, UserTypeEnum].
- Added a batch_list table and linked it into the physical_count table (new migration files).
### 07/10/2023 - CJ Felicitas
- configured the laravel sanctum.
- fixed the issue in the CORS (frontend to backend api communication).
- added a new controller "AuthController".
- added a new routes that are related to api authentication.
### 30/09/2023 - CJ Felicitas
- Added some initial migration files.
- partially added some models.
- Created some few database seeders.
### 24/09/2023 - CJ Felicitas
- Created a documentation page for the api routes and resources.
- initially added two api routes [/dummyjson, /testapi].
- added a new favicon.
.
