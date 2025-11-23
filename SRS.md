# SOFTWARE REQUIREMENTS SPECIFICATION (SRS)
# Attestation Generation and Verification System

---

## 1. Introduction

### 1.1 Purpose
This Software Requirements Specification (SRS) defines the functional and non-functional requirements of the Attestation Generation and Verification System. The system enables the creation, issuance, distribution, and verification of attestations (certificates). The three main user roles are:

- Admins – manage the system with full access.
- Issuers – create templates, generate attestations, and assign them to verifiers.
- Verifiers – receive and validate attestations through unique links or certificate UUIDs.

The goal of this system is to streamline attestation creation, distribution, verification, and template management.

### 1.2 Scope
The system will support:

- Dynamic template creation (design + content)
- Attestation generation from templates
- Assignment of attestations to single or multiple verifiers
- Public verification via unique links or certificate UUIDs
- Dashboard management for Admins and Issuers
- Role-based authorization using Spatie Permissions
- Multiple Filament panels for interface separation

## 2. System Overview

The platform provides:

- Template Management – creation, customization, and storage.
- Attestation Issuance – generate certificates from templates.
- Verifier Assignment – link attestations to selected individuals.
- Verification Workflow – validate attestation authenticity.
- Role-Based Access Control – restrict features based on role.
- Multi-panel dashboards created with Filament.

## 3. User Roles

### 3.1 Admin

- Full access to all panels
- Manage all users (Admin, Issuer, Verifier)
- Manage all templates and attestation designs
- View all issued attestations
- Configure system settings
- Manage global designs and template types

### 3.2 Issuer

- Create and manage their own attestation templates
- Select from existing attestation designs
- Configure template styles and placeholders (e.g., `{{name}}`, `{{date}}`, `{{course}}`)
- Add and manage verifiers for each template or attestation
- Generate single or bulk attestations (bulk handled via queues)
- Track verification status of all issued attestations
- Resend verification or download links to verifiers

### 3.3 Verifier

- Receive personalized link to submit required information
- Receive unique certificate UUID for authenticity checks
- Verify attestation validity through public routes
- Download their attestation or certificate (if permitted)

## 4. Functional Requirements

### 4.1 User Management

**Admin**
- Create, update, delete users
- Assign roles and permissions
- View system-wide user activity

**Issuer**
- Add verifiers manually
- Import verifiers in bulk (CSV or Excel)
- Edit verifier details

**Verifier**
- Access public verification pages only
- Provide identification details

### 4.2 Template Management
Each template consists of two parts:

Design
- Background graphic or certificate layout
- Font styles, signature placement, and decorative elements
- Predefined certificate types (e.g., "Certificate of Completion", "Attestation of Participation")

Content
- Dynamic placeholders such as:
  - `{{name}}`
  - `{{date}}`
  - `{{course}}`
  - `{{issuer}}`
- Customizable static text
- Preview feature before saving

Functional Requirements
- Create a template
- Edit, update or clone template
- Preview template before usage
- Delete unused or obsolete templates
- Restrict templates to owners (Issuer-only) or global (Admin)

### 4.3 Attestation Generation

- Select a template for issuance
- Fill in dynamic fields manually or use bulk upload
- Generate a certificate as a PDF or digital file
- Assign to one or more verifiers
- Generate unique UUID per attestation
- Automatically send verification link to verifier
- Support bulk generation using queues for performance

### 4.4 Verifier Workflow

- Access a unique verification link sent by the issuer
- Submit necessary data (e.g., name, email)
- System validates submission against stored verifier data
- If valid:
  - Display verification success page
  - Allow download of the attestation (if permitted)
- If invalid:
  - Display verification failed page
- Optionally show issuer details, issue date, and certificate type

### 4.5 Verification Module

- Public route to verify any certificate using UUID
- Should return authenticity status, certificate details, issuer information
- QR code support linking to verification URL
- Admin/Issuer can revoke certificates and mark as invalid

### 4.6 Dashboard Requirements

**Admin Dashboard**
- User management
- Template and design management
- System metrics and logs
- All attestations overview

**Issuer Dashboard**
- Issuer-specific templates
- Issued attestations list
- Verifier management
- Analytics (e.g., number of attestations issued, verification percentage)

**Verifier Dashboard**
- No direct dashboard
- Public verification pages only

## 5. Non-Functional Requirements

### 5.1 Security

- Role-based access: Spatie Permissions
- Filament multi-panel isolation (Admin, Issuer)
- Signed verification URLs
- Secure generation and storage of UUIDs
- Validation of verifier identity

### 5.2 Performance

- Bulk generation must use queues (Redis or database)
- PDF generation optimized for high throughput
- Verification pages must load quickly

### 5.3 Scalability

- System supports unlimited issuers
- Templates can scale with growing designs
- Verification service must handle high public traffic

### 5.4 Usability

- Intuitive WYSIWYG editor for template content
- Simple verification UI for non-technical users
- Mobile-responsive layouts for verification pages

## 6. Database Requirements (High Level)

At minimum, the system requires the following tables:

- `users`
- `roles`, `permissions`, `model_has_roles`, `role_has_permissions`
- `templates`
- `template_designs`
- `template_contents`
- `verifiers`
- `attestations`
- `attestation_verifiers`
- `verification_logs`

## 7. Technology Stack

- Laravel 12
- Filament v4 (multi-panel architecture)
- Spatie Permissions
- Blade or custom rendering engine for templates
- PDF generation tool (`barryvdh/laravel-dompdf`)
- Redis / Database queue
- TailwindCSS for UI

---

*This file contains the Software Requirements Specification (SRS) for the Attestation Generation and Verification System. To replace the repository `README.md`, move/rename this file to `README.md`.*
