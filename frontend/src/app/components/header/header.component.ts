import { Component } from '@angular/core';

import { AuthService } from '../../services/auth.service';
@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent {
  
  constructor(private auth: AuthService) { }

  hasTokken(): boolean {
    return this.auth.hasToken();
  }

  logout(): void {
    this.auth.logout();
  }
}
