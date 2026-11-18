# Contact Form 7 — Rooted and Roaming contact form

This is **Flowbite-inspired styling**, implemented as standalone child-theme SCSS. It uses the Rooted and Roaming color tokens, not Flowbite's Tailwind classes or runtime.

Paste the following into **Contact → Contact Forms → Form**.

## Default input size (recommended)

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
    [submit class:rr-button class:rr-button--primary "Submit"]
  </div>
</div>
```

## Large input option

Keep the same markup, but add `class:rr-field--lg` to any field whose input should be larger:

```text
[text* your-name id:rr-contact-name class:rr-field class:rr-field--lg autocomplete:name placeholder "Your name"]
[email* your-email id:rr-contact-email class:rr-field class:rr-field--lg autocomplete:email placeholder "name@example.com"]
```

Default fields use 0.875rem type and compact padding; large fields use 1rem type and larger padding. Both sizes are full-width inside a centered 28rem form wrapper. To adjust the form width, override `.rr_contact_form_wrapper` in your child theme styles.

**Important:** Field IDs must be unique per page. Use different IDs when showing the form more than once.

## Google reCAPTCHA v3

The site uses **Contact Form 7 → Integration → reCAPTCHA**. Configure v3 site and secret keys through the WordPress admin. **No CAPTCHA form tag is needed.** Use development credentials for localhost and separate production credentials. Keep secret keys out of source control. Test valid and suspicious submissions; v3 uses a risk score and will not reject every spam message.

## Email and release checks

- Confirm the Contact Form 7 **Mail** tab references `[your-name]` and `[your-email]`; use a verified site-domain From address with `Reply-To: [your-email]`.
- Test empty required fields, invalid email, keyboard focus, submission success/error feedback, and email delivery.
- Verify reCAPTCHA on localhost in browser dev tools and via actual form submissions.
- Check 320px mobile, tablet, desktop, and 200% zoom.
- Run `npm ci && npm run build` and ensure `git diff -- assets/css/theme.css` is empty. Commit the generated CSS if required.
- The theme only styles the form; Contact Form 7 must be installed and configured separately.

## Submission storage

The child theme does **not** create database tables or store personal information. A separate plugin can implement validated submission storage, with form-ID allowlisting, safeguards, restricted administration, retention/deletion, and privacy disclosures.
