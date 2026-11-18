# Contact Form 7 — Rooted and Roaming contact form

Paste this template into **Contact → Contact Forms → Form**. The child theme styles the form; Contact Form 7 handles validation, spam checks, and email.

```html
<div class="rr_contact_form_wrapper">
  <div class="rr_contact_form_field">
    <label class="rr-form__label" for="rr-contact-name">Your name</label>
    [text* your-name id:rr-contact-name class:rr-field autocomplete:name]
  </div>
  <div class="rr_contact_form_field">
    <label class="rr-form__label" for="rr-contact-email">Your email</label>
    [email* your-email id:rr-contact-email class:rr-field autocomplete:email]
  </div>
  <div class="rr_contact_form_security">[turnstile]</div>
  <div class="rr_contact_form_actions">
    [submit class:rr-button class:rr-button--primary "Submit"]
  </div>
</div>
```

**Important:** The IDs must be unique per page. If embedding the form more than once on a page, choose distinct IDs or use nested labels instead.

## Spam protection

Requires **Contact Form 7 6.1+**. In WordPress, open **Contact → Integration → Cloudflare Turnstile** and configure the Cloudflare site and secret keys. The `[turnstile]` tag positions the widget, but does not activate protection without keys. Do not store these secrets in theme files. Check the actual rendered page and send test spam/valid submissions before launch.

## Email and release checks

- Verify the Contact Form 7 **Mail** tab still references `[your-name]` and `[your-email]`, with a site-domain From address and Reply-To set to `[your-email]`.
- Verify required-field and invalid-email errors, Turnstile behavior, successful submission, and email delivery.
- Check mobile layout, keyboard focus, and a screen reader's label announcements.
- Run `npm ci && npm run build` and deploy the generated `assets/css/theme.css`.
- If Contact Form 7 is not active, the child theme merely provides unused CSS.

## Submission storage

This theme deliberately does **not** create database tables or save personal information. For custom storage, implement a separate plugin that hooks into Contact Form 7 **after validation and spam filtering**, with explicit form-ID allowlisting, permission-restricted administration, error handling, retention/deletion policy, and appropriate privacy disclosures. Treat email delivery and durable storage as separate outcomes.
