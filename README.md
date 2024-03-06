
# Founders Hub Africa

This is the backend for the foundershubafrica.com / foundershub.africa website. The backend contains the admin dashboard and endpoints for the frontend.

## **This project is still under development**

## Used By

This project is used by:

- Founders Hub Africa

## API Reference for enum values used in the regisrations

#### focus areas

```http
  GET /api/enums/focus-areas
```

#### impact options

```http
  GET /api/enums/social-env-impacts
```
#### investor focus area options

```http
  GET /api/enums/investor-focus-areas
```
#### viability criteria options

```http
  GET /api/enums/viability-criterias
```
#### business type options

```http
  GET /api/enums/business-types
```
#### funding status options

```http
  GET /api/enums/funding-status
```
#### partnering options

```http
  GET /api/enums/partnering-options
```
#### financial level options

```http
  GET /api/enums/financial-levels
```
#### Co-Investing options

```http
  GET /api/enums/co-investings
```

#### Convenient Investments options

```http
  GET /api/enums/convenient-investments
```

#### enterprise levels options

```http
  GET /api/enums/enterprise-levels
```

#### skill importance options

```http
  GET /api/enums/skill-importance-options
```

#### membership benefits options

```http
  GET /api/enums/membership-benefits
```
#### collaboration types options

```http
  GET /api/enums/collaboration-types
```
#### aspirations types options

```http
  GET /api/enums/aspirations
```
#### goals options

```http
  GET /api/enums/goals
```
#### motivation options

```http
  GET /api/enums/motivations
```

#### all enhancing credibility options

```http
  GET /api/enums/enhancing-credibility
```

## API Reference for registering identities
#### Register a Professional

```http
  POST /api/register-professional
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`    | `string` | **Required**. Name of the professional. |
| `email`   | `string` | **Required**. Email of the professional. |
| `motivation` | `string` | **Required**. Motivation of the professional. |
| `credibility_enhancement` | `string` | **Required**. Credibility enhancement of the professional. |
| `interests` | `string` | **Required**. Interests of the professional. |
| `skills` | `string` | **Required**. Skills of the professional. |
| `benefits` | `string` | **Required**. Benefits of the professional. |
| `collaboration_engagement` | `string` | **Required**. Collaboration engagement of the professional. |
| `aspirations` | `string` | **Required**. Aspirations of the professional. |
| `contributions` | `string` | **Required**. Contributions of the professional. |
| `skill_importance` | `string` | **Required**. Skill importance of the professional. |
| `goals` | `string` | **Required**. Goals of the professional. |

#### Register a Founder

```http
  POST /api/register-founder
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`    | `string` | **Required**. Name of the founder. |
| `email`   | `string` | **Required**. Email of the founder. |
| `company_name` | `string` | **Required**. Company Name of the founder. |
| `business_type` | `string` | **Required**. Business Type of the founder's company. |
| `financial_level` | `string` | **Required**. financial level of the founder's company. |
| `focus_area` | `string` | **Required**. Focus area of the founder. |
| `challenges` | `string` | **Required**. Challenges faced by the founder. |
| `funding_status` | `string` | **Required**. Funding status of the founder. |
| `partnership` | `string` | **Required**. Partnership option of the founder. |
| `community_support` | `string` | **Required**. Community support thoughts. |

#### Register an Investor

```http
  POST /api/register-investor
```


| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `name`    | `string` | **Required**. Name of the investor. |
| `email`   | `string` | **Required**. Email of the investor. |
| `enterprise_level` | `string` | **Required**. enterprise level the investor is interested in. |
| `co_investing` | `string` | **Required**. Co-Investment options of the investor. |
| `convenient_investing` | `string` | **Required**. Convenient investing options to the investor. |
| `focus_area` | `string` | **Required**. Focus areas for the investor. |
| `impact` | `string` | **Required**. How the investor measures impact. |
| `viability` | `string` | **Required**. How the investor assesses business viability. |
| `expectation` | `string` | **Required**. Expectations of the investor. |
| `Concerns` | `string` | **Required**. Concerns of the investor. |

## API Reference for getting a list of identities
#### List Founders
```http
  GET /api/founders
```
#### List Investors
```http
  GET /api/investors
```
## API Reference for login of identities

#### Request OTP for Login
##### Founder
```http
  POST /api/founder-request-otp
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. Email of the founder.
 |

##### Investor
```http
  POST /api/investor-request-otp
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. Email of the investor.|

#### Identity Login
##### Founder
```http
  POST /api/founder-login
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. Email of the founder.
 |
 | `otp`      | `string` | **Required**. OTP Sent to the founder email.|

##### Investor
```http
  POST /api/investor-login
```
| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email`      | `string` | **Required**. Email of the investor.|
| `otp`      | `string` | **Required**. OTP Sent to the investor email.|



## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

```bash
  cd repository
```
```bash
  composer install
```
```bash
  cp .env.example .env
```
```bash
  php artisan key:generate
```
```bash
  php artisan migrate --seed
```
```bash
php artisan serve
```

## Contributing

Contributions are always welcome!

Please reach out to me at ianyakundi015@gmail.com on ways to contribute.


## Deployment


