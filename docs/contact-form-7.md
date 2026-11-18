# Contact Form 7 — Flowbite-inspired dark form

The child theme provides an opt-in, dark Flowbite-inspired form using standalone Sass/CSS. Only markup inside `.rr_contact_form_wrapper` is styled, plus its Contact Form 7 response output. Other site forms are not changed. No Flowbite or Tailwind dependency is required.

Paste into **Contact → Contact Forms → Form**:

```html
<div class="rr_contact_form_wrapper">
  <div class="rr_contact_form_field">
    <label class="rr-form__label" for="rr-contact-name">Your name</label>
    [text* your-name id:rr-contact-name class:rr-field autocomplete:name placeholder "Your name"]
  </div>
  <div class="rr_contact_form_field">
    <label class="rr-form__label" for="rr-contact-email">Your email</label>
    [email* your-email id:rr-contact-email class:rr-field autocomplete:email placeholder "name@example.com"]
  </div>
  <div class="rr_contact_form_actions">
    [submit "Submit"]
  </div>
</div>
```

**Large field option:** Add `class:rr-field--lg` to either input field:

```text
[text* your-name id:rr-contact-name class:rr-field class:rr-field--lg autocomplete:name placeholder "Your name"]
[email* your-email id:rr-contact-email class:rr-field class:rr-field--lg autocomplete:email placeholder "name@example.com"]
```

Default fields have 14px text and minimum height 42px; large fields have 16px text and minimum height 52px. The form is centered and capped at 24rem like the Flowbite `max-w-sm mx-auto` example. The reference password and terms checkbox are intentionally not added to this name/email contact form. IDs must be unique if the form occurs more than once on a page.

## Google reCAPTCHA v3

Configure site and secret keys under **Contact → Integration → reCAPTCHA** in WordPress. No reCAPTCHA form tag is needed. Use development credentials for localhost and separate production credentials. Do not commit secret keys to Git. Verify that legitimate messages pass and suspicious submissions are filtered; reCAPTCHA v3 is scoring-based, not a guarantee against spam.

## Checks before merging

- Run `npm ci`, `npm run build`, and `git diff -- assets/css/theme.css`. The stylesheet should match the Sass output.
- Test label associations, keyboard focus, empty/invalid fields, successful submissions, reCAPTCHA, email notifications, 320px mobile, and 200% zoom in MAMP.
- Confirm the Mail tab refers to `[your-name]` and `[your-email]`, using a site-domain sender and `Reply-To: [your-email]`.
- Styling-only theme work: storing submissions in custom database tables belongs in a separate plugin.
